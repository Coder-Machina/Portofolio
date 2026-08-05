QA Checklist — Portfolio site

Environment
- Run locally: `php artisan serve` (default http://127.0.0.1:8000)
- Build assets: `npm run build`
- Ensure storage link: `php artisan storage:link`

Functional tests
- Admin flows
  - [ ] Dashboard loads and displays counts.
  - [ ] Projects index shows thumbnails, featured flag, order.
  - [ ] Create a project with thumbnail upload -> image stored and visible.
  - [ ] Edit a project and replace thumbnail -> old file deleted, new file shown.
  - [ ] Delete a project -> thumbnail file removed and project gone.
  - [ ] Skills: create/edit/delete, level displays as `N/5 — Label`.
  - [ ] Messages: view, toggle read/unread, deletion.

Visual & Responsive
- [ ] Check homepage, projects list and single project on mobile and desktop.
- [ ] Buttons and inputs use `btn-primary`, `btn-ghost`, `form-input` styles.
- [ ] Headings scale correctly (H1 larger on desktop).

Accessibility
- [ ] All images have alt text.
- [ ] Contrast passes (text over background) — spot check hero, cards, buttons.
- [ ] Form labels are associated with inputs.

Performance
- [ ] `public/build` contains compiled CSS/JS and fonts.
- [ ] Thumbnails are WebP when Intervention is installed.

Developer checks
- [ ] `composer require intervention/image` present in `composer.json` (if using image optimization).
- [ ] VS Code: restart language server if IntelliSense still flags Intervention.

How to report issues
- For visual bugs: include screenshot, browser + viewport size, and page URL.
- For functional bugs: include reproduction steps, expected vs actual result, and any console/server errors.

Optional follow-ups
- Add visual regression tests (Percy, Playwright snapshot tests).
- Add queued image optimization using `spatie/laravel-image-optimizer`.
