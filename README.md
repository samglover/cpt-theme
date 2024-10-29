# cpt-theme: the Client Power Tools theme for WordPress

A hybrid WordPress theme created by [Sam Glover](https://github.com/samglover). This theme is meant to be used as a parent theme for custom web development projects.

## Creating a Child Theme

### 1. Create a **cpt-theme-CLIENTNAME** child theme folder 

Replace CLIENTNAME with the name of the client or project. (For example, the child them folder for [my website](https://samglover.net/) is **cpt-theme-samglover**.)

### 2. Create **style.css**

Create a **style.css** file in the child theme folder and copy and paste this into the file:

```css
/*------------------------------
Theme Name:   CPT Theme for CLIENT NAME
Template:     cpt-theme
Version:      1.0.0
Author:       Sam Glover
Author URI:   https://samglover.net
------------------------------*/
```

**This file is not for adding custom CSS styles.** It is only used for the child theme properties and for incrementing the version number (which also updates the cachebuster variable).

### 3. Create **functions.php**

Create a **functions.php** file in the child theme folder and copy and paste this into the file:

```php
<?php

/**
 * Constants
 */
define('CPT_THEME_CHILD_DIR_PATH', trailingslashit(get_stylesheet_directory()));
define('CPT_THEME_CHILD_DIR_URI', trailingslashit(get_stylesheet_directory_uri()));
define('CPT_THEME_CHILD_VERSION', wp_get_theme()->get('Version'));

/**
 * Frontend Theme Files
 */
add_action('wp_enqueue_scripts', 'cpt_theme_child_frontend_stylesheets_scripts', 20);
function cpt_theme_child_frontend_stylesheets_scripts() {
  wp_enqueue_style('cpt-theme-child-frontend', CPT_THEME_CHILD_DIR_URI . 'assets/css/frontend.css', [], CPT_THEME_CHILD_VERSION);
}
```

### 4. Copy **theme.json**

Copy [theme.json](https://github.com/samglover/cpt-theme/blob/main/theme.json) into the child theme folder. I delete most of the contents and keep only the properties I need. Usually these include:

* settings.colors.palette
* settings.typography.fontFamilies
* styles.typography.fontFamily

### 4. Create CSS folders and files

I use [Sass/SCSS](https://sass-lang.com/) to make it easier to write CSS. I start by creating the following folder structure:

```
/assets
├─/css
├─/scss
```

Copy the [_variables.scss](https://github.com/samglover/cpt-theme/blob/main/assets/scss/_variables.scss) file from cpt-theme to the same location (**/assets/scss**) in the child them folder.

Create the following files in **/assets/scss**:

* _content.scss
* _elements.scss
* _header.scss
* _menus.scss
* frontend.scss

In **frontend.scss**, copy and paste the following:

```scss
@import 'variables';

@import 'content';
@import 'elements';
@import 'header';
@import 'menus';
```

(See issue #30 regarding @import deprecation.)

Copy the [package.json](https://github.com/samglover/cpt-theme/blob/main/package.json) file from cpt-theme.

Install npm for the child theme by running `npm install` from the terminal in the child theme directory. Run `npm run dev` and Sass will watch your project and compile the CSS every time you save a .scss file. Run `npm run build` to compile CSS files before deploying to production.

### 5. Copy **.gitignore**

Copy the [.gitignore](https://github.com/samglover/cpt-theme/blob/main/.gitignore) file from cpt-theme and double-check it before creating a git or GitHub repository.
