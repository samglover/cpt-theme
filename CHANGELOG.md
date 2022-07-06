# Changelog for the Client Power Tools WordPress Theme

All notable changes to this project will be documented in this file. The format
is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).


## 2.2 - 2022-07-06

### Changed
- Reworked the menu so that hover actions work better across touch devices. Plus, animations!
- Simplify the menu collapser function so it is showing/hiding the collapsed menu items instead of adding and removing it.


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
