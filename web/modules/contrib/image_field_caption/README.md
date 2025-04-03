# Image Field Caption

This module extends Drupal's image field functionality by adding a dedicated text area for captions. Similar to the `alt` and `title` attributes, the caption field allows users to provide descriptive text or HTML content for images.

For comprehensive documentation, visit the [Image Field Caption project page](https://www.drupal.org/project/image_field_caption).

To report bugs, suggest features, or track changes, visit the [issue queue](https://www.drupal.org/project/issues/image_field_caption).

---

## Table of Contents

1. [Requirements](#requirements)
2. [Installation](#installation)
3. [Usage](#usage)
4. [Configuration](#configuration)
5. [Troubleshooting](#troubleshooting)
6. [Caption Theming](#caption-theme)
7. [Caption CSS](#caption-css)
8. [Maintainers](#maintainers)

---

## Requirements

- **Drupal Core**: This module requires no additional modules beyond Drupal core.

---

## Installation

1. **Download the module**:
  - Use Composer: `composer require drupal/image_field_caption`
  - Or download manually from the [Drupal project page](https://www.drupal.org/project/image_field_caption).

2. **Install the module**:
  - Place the module in the `modules/contrib` directory.

3. **Enable the module**:
  - Navigate to `Admin > Extend` and enable the "Image Field Caption" module.

4. **Clear caches**:
  - Flush Drupal's caches via `Admin > Configuration > Performance` or using Drush: `drush cr`.

---

## Usage

1. **Add or configure an image field**:
  - Add a new image field to a content type or edit an existing one.
  - On the "Manage display" tab, set the field format to **"Image with caption"**.

2. **Enable the caption field**:
  - Check the "Enable Caption field" checkbox in the field settings.

3. **Add or edit content**:
  - Create or edit a node or entity with the configured image field.
  - Enter text or HTML into the caption text area and select the desired text format.

4. **Save and view**:
  - Save the entity and view it to see the caption displayed with the image.

---

## Configuration

- Configuration is performed on a **per-field basis**.
- Adjust settings for each image field under the "Manage display" tab.

---

## Troubleshooting

- **Issue**: Caption text area not displaying under the image field.
  - **Solution**: Clear Drupal's cache via `Admin > Configuration > Performance` or using Drush: `drush cr`.

---

## Caption Theme

  By default, an image field's caption will be rendered below the image.
  To customize the image caption display,
  copy the image-caption-formatter.html.twig file
  to your theme's directory and adjust the html for your needs.
  Flush Drupal's theme registry cache to have
  it recognize your theme's new file:

1. Copy the `image-caption-formatter.html.twig` file from the module to your theme directory:
2. Modify the HTML structure as needed.

3. Clear the theme registry cache:
- Via Drupal UI: `Admin > Configuration > Performance > Clear all caches`.
- Or using Drush: `drush cr`.

---

## Caption CSS

To style the caption, use the following CSS selector:
```css
blockquote.image-field-caption {
/* Add custom styles here */
}
```
## Maintainers

- Tyler Struyk - [iStryker](https://www.drupal.org/u/istryker)
