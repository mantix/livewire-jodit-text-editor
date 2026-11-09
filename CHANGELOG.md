# Changelog

All notable changes to this project will be documented in this file.

## v1.11  - 2026-11-09

### Fixed

- Properly destruct Jodit instances before creating new ones to prevent memory leaks
- Prevent accumulation of 'update-jodit-content' event listeners on wire:navigate

## v1.10  - 2026-07-30

### Added

- Support for custom options to text Editor
- Fixed duplicates due to wire:ignore #issue 12

## v1.9  - 2026-01-22

### Added

- Support for Livewire 4 alongside Livewire 3
- Updated composer.json to allow both `^3.0` and `^4.0` versions of Livewire

## v1.8  - 2026-01-06

Fixed handling multiple editor when updating Jodit content.

Thanks to @cakmalik

## V1.7 - 2025-10-27

Added support for a Jodit theme, thanks to @thsteinmetz

## V1.6 - 2025-05-09

Fix: correct event detail handling in Jodit editor update.

## v1.5.0 - 2025-05-08

### Added

- Support for targeting specific editors with the `identifier` parameter
- Enhanced `update-jodit-content` event with selective editor targeting
- Backward compatibility for existing implementations

### Improved

- Documentation for programmatically updating editor content
- Multiple editor support on the same page

## v1.4.0 - 2024-09-29

### Added

- Sticky toolbar as default for better UX
- Improved content area navigation

### Changed

- Updated dependencies for better stability and security

## v1.3.0 - 2024-07-18

### Added

- New feature: Customizable toolbar buttons via the "buttons" attribute
- Dynamic toolbar configuration options

### Credits

- Thanks to @guiluxdj for the idea and contribution in PR #2

## v1.2.0 - 2024-04-16

### Added

- Event listener to update content values
- Support for programmatic content updates

### Removed

- Deprecated theme option

## v1.1.0 - 2024-04-16

### Added

- Custom toolbar implementation
- Improved documentation
- Enhanced installation instructions

## v1.0.0 - 2024-01-10

### Added

- First stable release
- Base Jodit integration with Livewire 3
- Core text editing functionality
- Image upload support

## v0.1.0-beta - 2023-12-15

### Added

- Initial beta release
- Basic WYSIWYG editing capabilities
- Livewire component implementation
