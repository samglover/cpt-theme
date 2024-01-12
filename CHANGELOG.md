# Changelog for the Client Power Tools WordPress Theme

All notable changes to this project will be documented in this file. The format
is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).


## 3.0.6

### Changed
- Remove the submenu screen when no submenu modal is open.
- Lots of menu and modal stylesheet cleanup, refinement, and simplification.
- The call-to-action modal and the submenus on mobile now function similarly, and can be dismissed by clicking outside the modal or using the escape key.


## 3.0.5

### Changed
- Changed bylines from clunky echo statements to translation-friendly printf statements.
- Moved box-shadow and text-shadow variables to theme.json settings.shadow so they are easier to update in a child theme.
- Moved border styles to theme.json settings.custom so they are easier to update in a child theme.
- Continue migrating block and element styles from CSS to theme.json.

### Removed
- Remove button block styles.
- Remove wp-block-styles.


## 3.0.4

### Changed/Fixed
- Sticky menu no longer attempts to be sticky when the window width is 600px or less. This aligns with the width at which the WordPress admin bar is no longer position: fixed.
- Previously the mobile menu would not work properly on some mobile devices (like Chrome for Android). Now it works properly. All hover states have been replaced by clicks to open and close.
- At mobile widths dropdown menus now open as full-screen modals.
- The escape key now closes dropdown menus. So do clicks outside the dropdown menus.


## 3.0.3

### Changed
- Footer widget breakpoints were messing up blocks' built-in breakpoints.


## 3.0.2

### Changed
- Single posts now show the date published and, if modified, the date the post was last modified.


## 3.0

### Changed
- Due to the way WordPress now handles fonts, it is no longer practical to select a font on the theme options page. Instead, fonts must be downloaded and added to the theme using theme.json. This is less user-friendly but is necessary to maintain compatibility. (See https://fullsiteediting.com/lessons/theme-json-typography-font-styles/ for more information.)

Steps to add a font in your child theme:

  1. Download the font files in woff2 format. (The [Google Webfonts Helper](https://gwfh.mranftl.com/fonts) is especially useful for this.)
  2. Add the font files to /assets/fonts/font-slug in your child theme folder. Don't forget the font license!
  3. Copy settings.typography.fontFamilies and styles.typography.fontFamily frtom the parent theme.json to the child theme's theme.json.
  4. Update the child theme's theme.json to use your font files.

- Colors are also now solely managed in theme.json.

### Added
- /fonts/albert-sans

### Removed
- /common/fonts.php, along with the google_fonts filter.
- Font options.
- Non-CTA color options (the CTA colors can stay in the theme options for now, at least).


## 2.4.25 - 2023-09-22

### Changed
- Added horizontal padding to .alignfull and .alignwide blocks with backgrounds.
- Un-fluid the normal text size.


## 2.4.24 - 2023-09-12

### Changed
- Restored some necessary styles for footer widgets.
- Button hover color.


## 2.4.23 - 2023-08-25

### Changed
- Removed the page header's bottom margin when there is a cover block.


## 2.4.22 - 2023-08-23

### Added
- site_logo_size filter.
- core/post-title block styling in theme.json.


## 2.4.21 - 2023-07-28

### Fixed
- Updated deprecated get_currentuserinfo() to wp_get_current_user().


## 2.4.20 - 2023-07-17

### Changed
- 404 page template.


## 2.4.19 - 2023-07-07

### Changed
- Removed top margin from .site-main.


## 2.4.18 - 2023-07-05

### Changed
- Removed unnecessary site content containers.
- Further tweaks to make block spacing more predictable.


## 2.4.17 - 2023-07-04

### Changed
- Enabled appearance tools in the block editor.
- Updated font sizes to use fluid typography.
- Eliminate theme.json properties that merely restate the defaults.
- Restructure layout to use root padding aware alignment. This means all containers now use .has-global-padding and .is-layout-constrained.


## 2.4.16 - 2023-06-19

### Fixed
- Fixed header not resizing at mobile widths.


## 2.4.15 - 2023-06-07

### Changed
- Move menu to the right of the call to action when wrapped under the site title/logo.
- Change menu icon.
- Added blog page to archives and post pages.


## 2.4.14 - 2023-06-01

### Changed
- Fixed font sizing.
- Fix nested block potitioning when set to alignwide or alignfull.


## 2.4.13 - 2023-05-18

### Changed
- Reverted right-left padding to blocks within .alignfull blocks (see 2.4.11).


## 2.4.12 - 2023-05-17

### Fixed
- Excluded span and img tags from alignfull max width.


## 2.4.11 - 2023-05-12

### Changed
- Add default right-left padding to blocks within .alignfull blocks. REVERTED in 2.4.13.

### Added
- Gradients based on the primary and secondary colors.


## 2.4.10 - 2023-04-26

### Changed
- Update heading and caption line heights.


## 2.4.9 - 2023-03-18

### Added
- Add $text-shadow variable and add text shadows to cover block text.

### Removed
- Removed the page date.

### Fixed
- Fixed a CSS variable in theme.json.


## 2.4.8 - 2023-03-14

### Changed
- Moved the .has-cover class to the body tag.


## 2.4.7 - 2023-03-07

### Added
- Added a global :default style.


## 2.4.6 - 2023-03-06

### Changed
- Removed the default X from search fields with text entered for Chrome and IE.


## 2.4.5 - 2023-02-14

### Changed
- Set the secondary menu to wrap over lines instead of going off into Narnia.


## 2.4.4 - 2023-02-08

### Changed
- Refinements to blog, archive, and search index layout.


## 2.4.3 - 2023-02-08

### Changed
- theme.json updates.


## 2.4.2 - 2023-02-06

### Changed
- More layout refinements.


## 2.4.1 - 2023-02-01

### Changed
- Further layout refinements.

## 2.4 - 2023-01-31

### Changed
- Removed Javascript from the menu and made it CSS-only.
- Switched to using the global content-size and wide-size CSS variables.
- Modified alignwide and alignfull layout styles.
- Switched from using custom spacing sizes to a custom spacing scale.
- Adjusted layout elements for greater compatibility.


## 2.3.20 - 2023-01-25

### Fixed
- Extra check when parsing blocks.


## 2.3.19 - 2023-01-18

### Changed
- Drop-down menus now work without Javascript.


## 2.3.18 - 2023-01-05

### Changed
- Renamed some SCSS variables for consistency.
- Customized block gap, spacing sizes, and enable margins and padding in theme.json.


## 2.3.17 - 2022-12-21

### Added
- Don't output the title on pages where the first block is a cover.
- Show the read-more link as a small button.


## 2.3.16 - 2022-12-15

### Added
- Support for cover-style featured images.


## 2.3.15 - 2022-12-13

### Added
- Links pointing to `#cpt-cta` will also trigger the call-to-action modal.

### Fixed
- Fixed a bug in the call-to-action modal that prevented the modal from being shown.


## 2.3.14 - 2022-12-05

### Changed
- Reset sticky nav menu position when it reaches the top.


## 2.3.13 - 2022-12-03

### Changed
- Added a max width to form elements.
- Added button class to comment form submit button.
- Set default button background-color to inherit.


## 2.3.12 - 2022-11-30

### Added
- Comment form and comment templates.

### Changed
- Set the line height for non-block buttons.
- Restore pointer events to header menu items with children.
- Refine comment templates and styling.


## 2.3.11 - 2022-11-18

### Fixed
- Sticky nav menu option now works properly.


## 2.3.10 - 2022-11-06

### Added
- Preheader.


## 2.3.9 - 2022-10-21

### Added
- Added a sticky header option.


## 2.3.8 - 2022-10-18

### Changed
- Enable blockGap in theme.json.
- Move custom font sizes from settings to presets in theme.json.


## 2.3.7 - 2022-10-16

### Changed
- Page numberings in breadcrumbs.
- Style page numbering for singular posts.
- Re-organize stylesheets.

### Fixed
- Breadcrumbs for the blog no longer show / Blog / Blog.


## 2.3.6 - 2022-10-16

### Changed
- Adjusted CTA modal sizing.


## 2.3.5 - 2022-10-05

### Changed
- Updated search form in page templates.
- Don't show the secondary menu container if the secondary menu isn't on.
- Show a breadcrumb for the blog page when the front page (home) is set to a page.

## 2.3.4 - 2022-09-26

### Added
- Added .site-header-primary-nav__inner, .site-header-secondary-nav__inner, .site-content__inner, and .site-footer__inner elements to make it easier to adjust the layout.

### Changed
- Rename style and script functions and files.
- Moved around a bunch of stylesheets.
- Updated SCSS variables.
- Move breadcrumbs code to its own file.
- Increase button padding.

### Removed
- Removed non-essential :visited and :focus declarations.
- Streamlined and minimized styles.

### Fixed
- Fixed modal dismiss-button size and color.


## 2.3.3 - 2022-09-20

### Added
- google_fonts filter.

## Changed
- Adjusted menu item spacing.
- Prevented double-loading stylesheet components.


## 2.3.2 - 2022-08-26

### Added
- CPT_THEME_VERSION constant.

### Changed
- Moved stylesheet and script registration to functions.php.
- Custom block styles are now loaded on both the front and back end.
- Improvements to custom block styles.
- Rename styles and scripts to avoid conflicts.
- Links in the content now have a light underline for clarity.
- Restyle menu items with children in the collapsed menu.

### Removed
- Editor stylesheet removed.


## 2.3.1 - 2022-08-18

### Changed
- Changed add_submenu_page() to add_theme_page().
- Removed trailing commas in function calls in /admin/options.php.
- Removed output buffering in /admin/options.php.
- Escaped output throughout.
- Change inline SVG elements to HTML elements with background images.


## 2.3 - 2022-07-23

### Added
- theme.json now contains colors, fonts, and more.
- Developer credit in the footer.

### Fixed
- All drop-down menus are now animated. (As opposed to just the primary menu.)


## 2.2.1 - 2022-07-12

### Changed
- Adjust block element line heights. (Exclude cite from blockquote line height.)
- Remove + from collapsed menu items with children.
- Added and implemented spacing variables.


## 2.2 - 2022-07-06

### Changed
- Reworked the menu so that hover actions work better across touch devices. Plus, animations!
- Simplify the menu collapser function so it is showing/hiding the collapsed menu items instead of adding and removing it.
- Simplify the call-to-action modal Javascript.
- Move CSS animations to their own file.


## 2.1.3 - 2022-06-19

### Fixed
- Changed add_theme_support('align-full') to add_theme_support('align-wide').
- Changed menu container measurement from scrollWidth to offsetWidth in menus.js.
- Fix primaryMenuCollapser() so it actually collapses the menu on load.


## 2.1.2 - 2022-06-03

### Changed
- Adjusted page navigation formatting.

### Fixed
- Removed overflow: scroll from modal cards.
- Fixed clearing and gallery block formatting.


## 2.1 - 2022-05-31

### Fixed
- Fixed menu collapser function.


## 2.0 - 2022-03-20

**WARNING: This update probably breaks child themes based on version 1.x because lots of tags and styles have changed. Do not update the Client Power Tools Theme on a live site.**

### Changed
- Removed namespaces and references.
- Added trailingslashit() to constants and changed every reference to them.
- Restructured the header and updated it with semantic tags. Updated styles to match.

### Removed
- Removed the sidebar page template.


## 1.2 - 2022-03-17

### Added
- Added an editor stylesheet, and added theme fonts to the admin.

### Changed
- Moved a lot of things around
- Configure for NPM and SASS.
- Prevent Jost from loading if the Client Power Tools plugin is active.
- Restructured the layout elements.
- Recalculate the type scale.


## 1.1.1 - 2022-01-18

### Changed
- Align first menu item in the secondary menu with the left side so that it doesn't run off the screen.
- Remove bottom margin from menu items.
- Adjust modal box-sizing property so the max-height property functions as intended.


## 1.1 - 2021-12-28

### Added
- Modal call to action that can display shortcodes and embed codes.
- Modal dismiss button (fades out modals).
- Add align-wide support.

### Changed
- Fix header menu so items align to the right and don't stretch to fill the container along either axis.
- Fix the header collapse script to accommodate the above fix.
- Menu collapser script clarified and consolidated.


## 1.0 - 2021-12-10

### Added
- Everything
