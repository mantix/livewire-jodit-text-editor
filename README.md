<h1 align="center">Livewire Jodit Text Editor (WYSIWYG)</h1>

<p align="center">
    <a href="https://github.com/mantix/livewire-jodit-text-editor/actions"><img src="https://github.com/mantix/livewire-jodit-text-editor/actions/workflows/tests.yml/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/mantix/livewire-jodit-text-editor"><img src="https://img.shields.io/packagist/dt/mantix/livewire-jodit-text-editor" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/mantix/livewire-jodit-text-editor"><img src="https://img.shields.io/packagist/v/mantix/livewire-jodit-text-editor" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/mantix/livewire-jodit-text-editor"><img src="https://img.shields.io/packagist/l/mantix/livewire-jodit-text-editor" alt="License"></a>
</p>

## 📋 Table of Contents
- [Introduction](#-introduction)
- [Installation](#-installation)
- [Basic Usage](#-basic-usage)
- [Advanced Features](#-advanced-features)
  - [Customizing Toolbar Buttons](#customizing-toolbar-buttons)
  - [Using Multiple Editors](#using-multiple-editors)
  - [Programmatically Updating Content](#programmatically-updating-content)
- [Customization](#-customization)
- [Changelog](#-changelog)
- [Contributing](#-contributing)
- [Support](#-support)

## ✨ Introduction
A powerful Livewire rich text editor (WYSIWYG) component built on top of Jodit Editor, providing seamless integration with Laravel Livewire.

> To use this package, you must have [Laravel 12](https://laravel.com/) or [Laravel 13](https://laravel.com/), with [Livewire 3](https://livewire.laravel.com/) or [Livewire 4](https://livewire.laravel.com/) installed.

## 📦 Installation
Install this package via Composer:
```bash
composer require mantix/livewire-jodit-text-editor
```

Include the Jodit Editor theme and the library in your layout or specific view:
```html
<!-- Include Jodit CSS Styling -->
<link rel="stylesheet" href="//unpkg.com/jodit@4.1.16/es2021/jodit.min.css">

<!-- Include the Jodit JS Library -->
<script src="//unpkg.com/jodit@4.1.16/es2021/jodit.min.js"></script>
```

Or use NPM to install the Jodit Editor directly in your project:
```bash
npm install jodit
```

Import it in your app.js like:
```javascript
// Jodit Editor
import 'jodit/esm/plugins/resizer/resizer'; // Resizer plugin is used when inserting images
import 'jodit/esm/plugins/video/video'; // Video plugin is used to insert videos
// Feel free to add extra plugins here...
import { Jodit } from 'jodit';
window.Jodit = Jodit;
```

And in your app.scss:
```scss
// Jodit Editor
@import 'jodit/es2021/jodit';
```

For additional information, refer to the [Jodit Editor documentation](https://xdsoft.net/jodit/docs/).

## 🎬 Basic Usage
The simplest way to use the editor:
```html
<livewire:jodit-text-editor wire:model.live="content" />
```

## 🚀 Advanced Features

### Customizing Toolbar Buttons
You can customize the toolbar buttons by passing an array:
```html
<livewire:jodit-text-editor 
    wire:model.live="content" 
    :buttons="['bold', 'italic', 'underline', 'strikeThrough', '|', 'left', 'center', 'right', '|', 'link', 'image']" 
/>
```

### Using Multiple Editors
When using multiple editors on the same page, you can assign unique identifiers to target them individually:

```html
<livewire:jodit-text-editor 
    wire:model.live="description" 
    identifier="description-editor" 
/>

<livewire:jodit-text-editor 
    wire:model.live="content" 
    identifier="content-editor" 
/>
```

### Programmatically Updating Content
You can update editor content programmatically using Livewire's dispatch method:

#### Update all editors on the page:
```php
// This will update all Jodit editors on the page
$this->dispatch('update-jodit-content', $newContent);
```

#### Update a specific editor:
```php
// This will only update the editor with the specified identifier
$this->dispatch('update-jodit-content', ['description-editor', $newContent]);
```

## 🎨 Customization
The text editor component is entirely customizable. Publish the view file to customize it:
```bash
php artisan vendor:publish --tag=livewire-jodit-text-editor-views
```

After publishing, you can edit the view at `resources/views/vendor/livewire-jodit-text-editor/livewire/jodit-text-editor.blade.php`.

## 🔄 Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## 🤝 Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## ❤️ Support
Is this plugin helpful to you? Let me know by connecting <a href='https://linkedin.com/in/pieternaber' target='_blank'>on LinkedIn</a> or <a href='https://x.com/pieternaber' target='_blank'>on X</a>.
