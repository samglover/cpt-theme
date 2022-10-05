# Changelog for the Client Power Tools WordPress Theme

All notable changes to this project will be documented in this file. The format
is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

## 2.3.5 - 2022-10-05

### Changed
- Updated search form in page templates.


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
