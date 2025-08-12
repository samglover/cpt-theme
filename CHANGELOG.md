# Changelog for the Client Power Tools WordPress Theme

All notable changes to this theme will be documented in this file. The format is based on [Keep a Changelog](https://keepachangelog.com) and uses [semantic versioning](https://semver.org/).

## 3.3.1 - 2025-08-12

### Fixed
- Use font size instead of em to set the submenu dismiss button size.

## 3.3.0 - 2025-08-06

### Added
- The new `menu-prevent-offscreen-submenus.js` script aligns submenus to the right edge of the parent menu item if they would otherwise overflow the screen.

### Changed
- Submenu dismiss button size adjusted to make it end up where it's supposed to.

## 3.2.6 - 2025-03-02

### Changed
- Removed `!important` from `:disabled` style


## 3.2.5 - 2025-02-25

### Fixed
- Page header background images now display as expected.


## 3.2.4 - 2025-02-20

### Added
- PHP documentation
- Non-block list items now have normal line-height.
- Tables now have a gap between cells.
- All output is now escaped.

### Changed
- Comment form labels are no longer all-caps.
- Block list items no longer have margins.
- Comment icon is now applied with CSS instead of inserted with file_get_contents().
- Move the Jost font files to the `/assets/fonts` folder where it belongs.
- The "page" and "404 not found" strings in `/frontend/breadcrumbs.php` are now translatable.

### Fixed
- Added the missing `</li>` closing tag in `/frontend/comment.php`.


## 3.2.3 - 2025-02-19

### Changed
- Wrapped the `img` style in normalize.scss in `:where()` in order to remove specificity so it's easier to override.


## 3.2.2 - 2025-01-26

### Fixed
- No longer includes a random post in the breadcrumbs if displaying a taxonomy archive when a page for posts does not exist. Instead, the function determines whether to show a blog or post type breadcrumb.
- Use wp_kses_post for breadcrumb labels instead of esc_html.


## 3.2.1 - 2025-01-21

### Changed
- Center images within the .wp-block-image container when using the rounded block style.


## 3.2.0 - 2024-12-08

### Changed
- Refactored breadcrumbs and added the `cpt_breadcrumbs` filter hook.


## 3.1.5 - 2024-12-06

### Added
* The modal dismiss button now has a screen reader text element within it for improved accessibility.


## 3.1.4 - 2024-11-27

### Changed

* Removed layout constraints from #site-footer so it's possible to use full-width widgets.
* Use built-in WP layout classes for .footer-meta.

### Added

* .is-content-justification-space-between utility class for group blocks.


## 3.1.3 - 2024-11-20

### Changed

* Added some padding to lists.


## 3.1.2 - 2024-11-11

### Changed

* Moved list spacing styles to theme.json
* Moved list item marker styles to _blocks.scss


## 3.1.0 & 3.1.1 - 2024-10-28

### Changed

* Refactored the menu
* Replaced the wonky + symbol for drop-down menus with an SVG.


## 3.0.25 - 2024-09-13

### Changed

* Increased the size of the submenu dismiss button on mobile and aligned it with the card padding.
* Increased the spacing between menu items on mobile.


## 3.0.24 - 2024-08-24

### Changed

* Disabled default font sizes.


## 3.0.23 - 2024-08-07

### Fixed

* Fixed secondary gradient.
* Fixed indentation of settings.typography.fontFamilies[0].fontFace in theme.json.


## 3.0.22 - 2024-08-07

### Changed

* Increased padding on archive descriptions and make the block group full-width.


## 3.0.21 - 2024-07-31

### Changed

* Increased menu gaps.


## 3.0.20 - 2024-07-30

### Changed

* Set the default bottom margin for headings (block and element) to the default font size.


## 3.0.19 - 2024-07-11

### Changed

* Doesn't output a .term-description container if the term description is empty.


## 3.0.18 - 2024-07-09

### Changed

* Added term descriptions to the index template with a background to set it off from the list of posts.
* Adjusted font size and spacing of comments.


## 3.0.17 - 2024-07-08

### Changed

* Added a blog breadcrumb to category, tag, and taxonomy archives.


## 3.0.16 - 2024-07-07

### Changed

* Changed all CSS **grid-gap** properties to **gap**.
* Changed site header layout from grid to flex, which also helped fix the below issues with the menu collapser.
* Now the menu collapser only runs when the DOM is ready, not before.
* Added a .15em offset to link underlines.

### Fixed

* CTA no longer stretches to the full width of the menu container when there is no primary menu selected (fix for [issue #21](https://github.com/samglover/cpt-theme/issues/21)).
* Menu now collapses gradually instead of all at once (fix for [issue #15](https://github.com/samglover/cpt-theme/issues/15)).
* Fixes submenu dismiss button overlay alignment on drop-down menus.
* Breadcrumbs for custom post types now include the post type archive instead of the blog page (fix for [issue #16](https://github.com/samglover/cpt-theme/issues/16)).


## 3.0.15 - 2024-06-11

### Changed

* Reduce left padding on lists.
* Align CTA text in the center of the button.


## 3.0.14 - 2024-05-31

### Changed

* Switch to add_option() for setting default options to avoid resetting options set to false.

### Fixed

* In cases where the page was empty or had very little content the page would not fill the vertical height of the browser. Fixed by using flex to stretch the page content to fill the browser height.
* Remove padding from image blocks styled as cards.
* Move widget styles to /assets/scss/frontend.scss.


## 3.0.13

### Changed

* Reduced the block gap in the buttons block.
* Specified a heading color.

### Fixed

* The script that adds necessary styles to the post editor's root container was not working the same on post-6.3 installs because [since 6.3 WordPress loads the post editor in an iframe](https://make.wordpress.org/core/2023/07/18/miscellaneous-editor-changes-in-wordpress-6-3/#post-editor-iframed). And the iframe does not always load before enqueued Javascript files, so the fix required some additional conditions. This should address most of the likely scenarios for pre* and post-6.3 installs so that the post editor contains the `.has-global-padding` and `.is-layout-constrained` classes but not `.is-layout-flow` so that it behaves like the `.entry-content` element on posts and pages. Also [shared on StackOverflow](https://stackoverflow.com/a/78426095/2844226) where I initially found the clue to my solution.
* Cite styles now work properly in theme.json.


## 3.0.12

### Changed

* Pullquote customizations.


## 3.0.11

### Changed

* Added padding and a border to quote blocks.


## 3.0.10

### Changed

* The page template now hides the page header (title) on the front page.
* The page template does not output the page header if the first block on the page is a cover block or a group block with a cover block as the first inner block.

### Fixed

* Added /assets/js/admin-editor-classes.js to add the correct classes to the block editor root container.


## 3.0.9

### Changed

* Name updated to Client Power Tools Theme since there are also several Client Power Tools plugins.
* Simplify CTA modal functionality and styling.

### Added

* Customizations for the Client Power Tools Portal plugin if it is installed and active.

### Fixed

* The Call to Action modal animation now works.


## 3.0.8

### Changed

* Eliminate modal dismiss button padding.


## 3.0.7

#### Changed

* Refinements to the menu collapser script so it runs faster and more efficiently, and so it looks better when it runs.


## 3.0.6

### Changed

* Remove the submenu screen when no submenu modal is open.
* Lots of menu and modal stylesheet cleanup, refinement, and simplification.
* The call-to-action modal and the submenus on mobile now function similarly, and can be dismissed by clicking outside the modal or using the escape key.


## 3.0.5

### Changed

* Changed bylines from clunky echo statements to translation-friendly printf statements.
* Moved box-shadow and text-shadow variables to theme.json settings.shadow so they are easier to update in a child theme.
* Moved border styles to theme.json settings.custom so they are easier to update in a child theme.
* Continue migrating block and element styles from CSS to theme.json.

### Removed

* Remove button block styles.
* Remove wp-block-styles.


## 3.0.4

### Changed/Fixed

* Sticky menu no longer attempts to be sticky when the window width is 600px or less. This aligns with the width at which the WordPress admin bar is no longer position: fixed.
* Previously the mobile menu would not work properly on some mobile devices (like Chrome for Android). Now it works properly. All hover states have been replaced by clicks to open and close.
* At mobile widths dropdown menus now open as full-screen modals.
* The escape key now closes dropdown menus. So do clicks outside the dropdown menus.


## 3.0.3

### Changed

* Footer widget breakpoints were messing up blocks' built-in breakpoints.


## 3.0.2

### Changed

* Single posts now show the date published and, if modified, the date the post was last modified.


## 3.0

### Changed

* Due to the way WordPress now handles fonts, it is no longer practical to select a font on the theme options page. Instead, fonts must be downloaded and added to the theme using theme.json. This is less user-friendly but is necessary to maintain compatibility. (See https://fullsiteediting.com/lessons/theme-json-typography-font-styles/ for more information.)

Steps to add a font in your child theme:

  1. Download the font files in woff2 format. (The [Google Webfonts Helper](https://gwfh.mranftl.com/fonts) is especially useful for this.)
  2. Add the font files to /assets/fonts/font-slug in your child theme folder. Don't forget the font license!
  3. Copy settings.typography.fontFamilies and styles.typography.fontFamily frtom the parent theme.json to the child theme's theme.json.
  4. Update the child theme's theme.json to use your font files.

* Colors are also now solely managed in theme.json.

### Added

* /fonts/albert-sans

### Removed

* /common/fonts.php, along with the google_fonts filter.
* Font options.
* Non-CTA color options (the CTA colors can stay in the theme options for now, at least).


## 2.4.25 - 2023-09-22

### Changed

* Added horizontal padding to .alignfull and .alignwide blocks with backgrounds.
* Un-fluid the normal text size.


## 2.4.24 - 2023-09-12

### Changed

* Restored some necessary styles for footer widgets.
* Button hover color.


## 2.4.23 - 2023-08-25

### Changed

* Removed the page header's bottom margin when there is a cover block.


## 2.4.22 - 2023-08-23

### Added

* site_logo_size filter.
* core/post-title block styling in theme.json.


## 2.4.21 - 2023-07-28

### Fixed

* Updated deprecated get_currentuserinfo() to wp_get_current_user().


## 2.4.20 - 2023-07-17

### Changed

* 404 page template.


## 2.4.19 - 2023-07-07

### Changed

* Removed top margin from .site-main.


## 2.4.18 - 2023-07-05

### Changed

* Removed unnecessary site content containers.
* Further tweaks to make block spacing more predictable.


## 2.4.17 - 2023-07-04

### Changed

* Enabled appearance tools in the block editor.
* Updated font sizes to use fluid typography.
* Eliminate theme.json properties that merely restate the defaults.
* Restructure layout to use root padding aware alignment. This means all containers now use .has-global-padding and .is-layout-constrained.


## 2.4.16 - 2023-06-19

### Fixed

* Fixed header not resizing at mobile widths.


## 2.4.15 - 2023-06-07

### Changed

* Move menu to the right of the call to action when wrapped under the site title/logo.
* Change menu icon.
* Added blog page to archives and post pages.


## 2.4.14 - 2023-06-01

### Changed

* Fixed font sizing.
* Fix nested block potitioning when set to alignwide or alignfull.


## 2.4.13 - 2023-05-18

### Changed

* Reverted right-left padding to blocks within .alignfull blocks (see 2.4.11).


## 2.4.12 - 2023-05-17

### Fixed

* Excluded span and img tags from alignfull max width.


## 2.4.11 - 2023-05-12

### Changed

* Add default right-left padding to blocks within .alignfull blocks. REVERTED in 2.4.13.

### Added

* Gradients based on the primary and secondary colors.


## 2.4.10 - 2023-04-26

### Changed

* Update heading and caption line heights.


## 2.4.9 - 2023-03-18

### Added

* Add $text-shadow variable and add text shadows to cover block text.

### Removed

* Removed the page date.

### Fixed

* Fixed a CSS variable in theme.json.


## 2.4.8 - 2023-03-14

### Changed

* Moved the .has-cover class to the body tag.


## 2.4.7 - 2023-03-07

### Added

* Added a global :default style.


## 2.4.6 - 2023-03-06

### Changed

* Removed the default X from search fields with text entered for Chrome and IE.


## 2.4.5 - 2023-02-14

### Changed

* Set the secondary menu to wrap over lines instead of going off into Narnia.


## 2.4.4 - 2023-02-08

### Changed

* Refinements to blog, archive, and search index layout.


## 2.4.3 - 2023-02-08

### Changed

* theme.json updates.


## 2.4.2 - 2023-02-06

### Changed

* More layout refinements.


## 2.4.1 - 2023-02-01

### Changed

* Further layout refinements.

## 2.4 - 2023-01-31

### Changed

* Removed Javascript from the menu and made it CSS-only.
* Switched to using the global content-size and wide-size CSS variables.
* Modified alignwide and alignfull layout styles.
* Switched from using custom spacing sizes to a custom spacing scale.
* Adjusted layout elements for greater compatibility.


## 2.3.20 - 2023-01-25

### Fixed

* Extra check when parsing blocks.


## 2.3.19 - 2023-01-18

### Changed

* Drop-down menus now work without Javascript.


## 2.3.18 - 2023-01-05

### Changed

* Renamed some SCSS variables for consistency.
* Customized block gap, spacing sizes, and enable margins and padding in theme.json.


## 2.3.17 - 2022-12-21

### Added

* Don't output the title on pages where the first block is a cover.
* Show the read-more link as a small button.


## 2.3.16 - 2022-12-15

### Added

* Support for cover-style featured images.


## 2.3.15 - 2022-12-13

### Added

* Links pointing to `#cpt-cta` will also trigger the call-to-action modal.

### Fixed

* Fixed a bug in the call-to-action modal that prevented the modal from being shown.


## 2.3.14 - 2022-12-05

### Changed

* Reset sticky nav menu position when it reaches the top.


## 2.3.13 - 2022-12-03

### Changed

* Added a max width to form elements.
* Added button class to comment form submit button.
* Set default button background-color to inherit.


## 2.3.12 - 2022-11-30

### Added

* Comment form and comment templates.

### Changed

* Set the line height for non-block buttons.
* Restore pointer events to header menu items with children.
* Refine comment templates and styling.


## 2.3.11 - 2022-11-18

### Fixed

* Sticky nav menu option now works properly.


## 2.3.10 - 2022-11-06

### Added

* Preheader.


## 2.3.9 - 2022-10-21

### Added

* Added a sticky header option.


## 2.3.8 - 2022-10-18

### Changed

* Enable blockGap in theme.json.
* Move custom font sizes from settings to presets in theme.json.


## 2.3.7 - 2022-10-16

### Changed

* Page numberings in breadcrumbs.
* Style page numbering for singular posts.
* Re-organize stylesheets.

### Fixed

* Breadcrumbs for the blog no longer show / Blog / Blog.


## 2.3.6 - 2022-10-16

### Changed

* Adjusted CTA modal sizing.


## 2.3.5 - 2022-10-05

### Changed

* Updated search form in page templates.
* Don't show the secondary menu container if the secondary menu isn't on.
* Show a breadcrumb for the blog page when the front page (home) is set to a page.


## 2.3.4 - 2022-09-26

### Added

* Added .site-header-primary-nav__inner, .site-header-secondary-nav__inner, .site-content__inner, and .site-footer__inner elements to make it easier to adjust the layout.

### Changed

* Rename style and script functions and files.
* Moved around a bunch of stylesheets.
* Updated SCSS variables.
* Move breadcrumbs code to its own file.
* Increase button padding.

### Removed

* Removed non-essential :visited and :focus declarations.
* Streamlined and minimized styles.

### Fixed

* Fixed modal dismiss-button size and color.


## 2.3.3 - 2022-09-20

### Added

* google_fonts filter.

## Changed

* Adjusted menu item spacing.
* Prevented double-loading stylesheet components.


## 2.3.2 - 2022-08-26

### Added

* CPT_THEME_VERSION constant.

### Changed

* Moved stylesheet and script registration to functions.php.
* Custom block styles are now loaded on both the front and back end.
* Improvements to custom block styles.
* Rename styles and scripts to avoid conflicts.
* Links in the content now have a light underline for clarity.
* Restyle menu items with children in the collapsed menu.

### Removed

* Editor stylesheet removed.


## 2.3.1 - 2022-08-18

### Changed

* Changed add_submenu_page() to add_theme_page().
* Removed trailing commas in function calls in /admin/options.php.
* Removed output buffering in /admin/options.php.
* Escaped output throughout.
* Change inline SVG elements to HTML elements with background images.


## 2.3 - 2022-07-23

### Added

* theme.json now contains colors, fonts, and more.
* Developer credit in the footer.

### Fixed

* All drop-down menus are now animated. (As opposed to just the primary menu.)


## 2.2.1 - 2022-07-12

### Changed

* Adjust block element line heights. (Exclude cite from blockquote line height.)
* Remove + from collapsed menu items with children.
* Added and implemented spacing variables.


## 2.2 - 2022-07-06

### Changed

* Reworked the menu so that hover actions work better across touch devices. Plus, animations!
* Simplify the menu collapser function so it is showing/hiding the collapsed menu items instead of adding and removing it.
* Simplify the call-to-action modal Javascript.
* Move CSS animations to their own file.


## 2.1.3 - 2022-06-19

### Fixed

* Changed add_theme_support('align-full') to add_theme_support('align-wide').
* Changed menu container measurement from scrollWidth to offsetWidth in menus.js.
* Fix primaryMenuCollapser() so it actually collapses the menu on load.


## 2.1.2 - 2022-06-03

### Changed

* Adjusted page navigation formatting.

### Fixed

* Removed overflow: scroll from modal cards.
* Fixed clearing and gallery block formatting.


## 2.1 - 2022-05-31

### Fixed

* Fixed menu collapser function.


## 2.0 - 2022-03-20

**WARNING: This update probably breaks child themes based on version 1.x because lots of tags and styles have changed. Do not update the Client Power Tools Theme on a live site.**

### Changed

* Removed namespaces and references.
* Added trailingslashit() to constants and changed every reference to them.
* Restructured the header and updated it with semantic tags. Updated styles to match.

### Removed

* Removed the sidebar page template.


## 1.2 - 2022-03-17

### Added

* Added an editor stylesheet, and added theme fonts to the admin.

### Changed

* Moved a lot of things around
* Configure for NPM and SASS.
* Prevent Jost from loading if the Client Power Tools plugin is active.
* Restructured the layout elements.
* Recalculate the type scale.


## 1.1.1 - 2022-01-18

### Changed

* Align first menu item in the secondary menu with the left side so that it doesn't run off the screen.
* Remove bottom margin from menu items.
* Adjust modal box-sizing property so the max-height property functions as intended.


## 1.1 - 2021-12-28

### Added

* Modal call to action that can display shortcodes and embed codes.
* Modal dismiss button (fades out modals).
* Add align-wide support.

### Changed

* Fix header menu so items align to the right and don't stretch to fill the container along either axis.
* Fix the header collapse script to accommodate the above fix.
* Menu collapser script clarified and consolidated.


## 1.0 - 2021-12-10

### Added

* Everything
