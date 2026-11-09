<div wire:ignore>
    <textarea id="{{ $joditId }}">{!! $value !!}</textarea>
</div>

@script
    <script>
        // Initialize global storage for Jodit instances and listeners if not exists
        if (!window.joditInstances) {
            window.joditInstances = {};
        }
        if (!window.joditListeners) {
            window.joditListeners = {};
        }

        // Cleanup function to remove orphaned instances
        const cleanupOrphanedInstances = () => {
            Object.keys(window.joditInstances).forEach(id => {
                const element = document.getElementById(id);
                if (!element || !element.isConnected) {
                    // Element no longer exists in DOM, clean up
                    try {
                        window.joditInstances[id].destruct();
                    } catch (e) {
                        // Ignore errors during destruct of orphaned instances
                    }
                    delete window.joditInstances[id];
                    
                    // Remove associated listener
                    if (window.joditListeners[id]) {
                        window.removeEventListener('update-jodit-content', window.joditListeners[id]);
                        delete window.joditListeners[id];
                    }
                }
            });
        };

        // Clean up orphaned instances before initializing
        cleanupOrphanedInstances();

        const joditId = @js($joditId);
        const identifier = @js($identifier);

        // Properly destruct existing Jodit instance if it exists
        if (window.joditInstances[joditId]) {
            window.joditInstances[joditId].destruct();
            delete window.joditInstances[joditId];
        }

        // Remove old event listener if it exists
        if (window.joditListeners[joditId]) {
            window.removeEventListener('update-jodit-content', window.joditListeners[joditId]);
            delete window.joditListeners[joditId];
        }

        // Fix from #13 Pull request: Remove cached editors due to wire:ignore and wire:navigation
        const textAreaElement = document.getElementById(joditId);
        textAreaElement.parentNode.querySelectorAll('.jodit').forEach(el => el.remove());
        
        const buttons = @json($buttons);
        const customOptions = @json($options); 

        // New support custom options - Define base defaults
        const baseOptions = {
            "autofocus": true,
            "toolbarSticky": true,
            "uploader": {
                "insertImageAsBase64URI": true
            },
            "toolbarButtonSize": "large",
            "showCharsCounter": false,
            "showWordsCounter": false,
            "showXPathInStatusbar": false,
            "defaultActionOnPaste": "insert_clear_html",
            "buttons": buttons,
            "theme": "{{ $theme }}"
        };

        // Merge defaults with custom options (customOptions will override baseOptions)
        const finalOptions = { ...baseOptions, ...customOptions };

        const editor = Jodit.make('#' + joditId, finalOptions);

        // Store the instance for future cleanup
        window.joditInstances[joditId] = editor;

        textAreaElement.addEventListener('change', function() {
            @this.set('value', this.value);
        });

        // Store the listener function so we can remove it later
        const updateContentListener = (event) => {
            if (Array.isArray(event.detail) && event.detail.length > 0) {
                if (Array.isArray(event.detail[0]) && event.detail[0].length === 2) {
                    const [targetId, newContent] = event.detail[0];
                    if (targetId === identifier) {
                        editor.value = newContent;
                    }
                } else {
                    editor.value = event.detail[0];
                }
            } else {
                console.warn('Invalid event detail format:', event.detail);
            }
        };

        window.joditListeners[joditId] = updateContentListener;
        window.addEventListener('update-jodit-content', updateContentListener);
    </script>
@endscript
