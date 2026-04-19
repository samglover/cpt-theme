# Copilot instructions for cpt-theme

## Project overview
- This repository is a hybrid WordPress parent theme
- Keep compatibility with child themes as a top priority
- Prefer minimal, targeted edits over broad refactors

## Key directories
- `assets/scss/`: source styles
- `assets/css/`: compiled CSS output committed to the repo
- `assets/js/`: scripts
- `frontend/`, `template-parts/`: frontend PHP logic and templates
- `admin/`: admin-only settings/UI code
- `vendor/`, `node_modules/`: dependencies; do not edit manually

## PHP conventions (WordPress)
- Follow WordPress Coding Standards style used in this repo
- Use WordPress APIs and hooks instead of custom abstractions when possible
- Escape all output and sanitize/validate all input
- Keep text domain as `cpt-theme` for translatable strings
- Preserve existing public hooks/function names unless a change is explicitly requested

## CSS/SCSS workflow
- Edit SCSS in `assets/scss/` when changing styles.
- Compile SCSS to CSS after style changes so `assets/css/` stays in sync
- Use existing npm scripts:
  - `npm run dev` for watch mode
  - `npm run build` for production compile

## JavaScript conventions
- Keep scripts lightweight and framework-free unless explicitly requested
- Follow existing patterns in `assets/js/` (plain JS, WordPress-friendly behavior)
- Avoid introducing build tooling changes unless necessary

## Dependency and file safety rules
- Do not modify files in `vendor/` or `node_modules/`
- Do not add new dependencies unless clearly justified
- Do not rename files or functions used by WordPress template loading/hooks unless requested

## Validation checklist for changes
- For PHP changes, run linting/static checks available in the repo when relevant
- For SCSS changes, run `npm run build` and verify generated CSS changed as expected
- Confirm no regressions in:
  - Menu behavior (`assets/js/menu-*.js`)
  - Header/CTA options and Customizer output in `functions.php`
  - Template rendering in `template-parts/` and frontend includes

## Commit/PR guidance
- Keep changes focused and atomic
- Document user-facing changes in `CHANGELOG.md` when appropriate
- Include a short test/verification note with commands run and outcomes