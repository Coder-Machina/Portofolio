Image optimization pipeline

Overview
- Controller: `app/Http/Controllers/Admin/ProjectController.php` handles thumbnail uploads.
- If `intervention/image` is installed, uploaded images are resized to 1200×800, auto-oriented, encoded to WebP at quality 80 and stored in `storage/app/public/projects/`.
- Fallback: if Intervention isn't available, the original uploaded file is stored in `storage/app/public/projects/`.

Key details
- Storage disk: `public` (served via `php artisan storage:link`).
- Thumbnail path: stored in the `thumbnail` column on the `projects` table (e.g. `projects/unique_12345.webp`).
- Safety: old thumbnails are deleted on update/delete to prevent orphaned files.

Commands
- Build assets:

```bash
npm run build
```

- Run tests:

```bash
php artisan test
```

- Install Intervention (if needed):

```bash
composer require intervention/image
```

Checks when debugging
- Verify `storage/app/public/projects` contains generated `.webp` images after upload.
- Ensure `php artisan storage:link` was run and `public/storage/projects/...` is accessible.
- If WebP not generated, confirm `class_exists(\Intervention\Image\ImageManagerStatic::class)` returns true.

Notes
- Intervention is optional; the code gracefully falls back to storing originals.
- For further optimization, consider running an image optimization step (e.g., `spatie/laravel-image-optimizer`) as a queued job after upload.
