# Changelog for the Client Power Tools WordPress Theme

All notable changes to this project will be documented in this file. The format
is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

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
