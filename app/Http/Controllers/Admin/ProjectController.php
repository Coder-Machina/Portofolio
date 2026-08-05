<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Format;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->ordered()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'short_desc'  => 'required|max:255',
            'full_desc'   => 'required',
            'tech_stack'  => 'required',
            'category_id' => 'required|exists:categories,id',
            'github_url'  => 'nullable|url',
            'live_url'    => 'nullable|url',
            'thumbnail'   => 'nullable|image|max:2048',
            'order'       => 'integer',
        ]);

        $data = $request->except(['thumbnail', 'tech_stack']);
        $data['slug']       = Str::slug($request->title);
        $data['tech_stack'] = array_map('trim', explode(',', $request->tech_stack));
        $data['featured']   = $request->boolean('featured');

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');

            // If Intervention Image is available, resize and save WebP optimized copy
            if (class_exists(ImageManager::class)) {
                $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $img = $manager->decodePath($file->getRealPath());

                // auto-orient and cover to exact size
                $img->modify(new \Intervention\Image\Modifiers\OrientModifier());
                $img->modify(new \Intervention\Image\Modifiers\CoverModifier(1200, 800));

                $filename = uniqid().'_'.time().'.webp';
                $path = 'projects/' . $filename;

                $encoded = $img->encodeUsingFormat(Format::WEBP, quality: 80);
                Storage::disk('public')->put($path, (string) $encoded);
                $data['thumbnail'] = $path;
            } else {
                // Fallback: store original file
                $data['thumbnail'] = $file->store('projects', 'public');
            }
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Projet créé !');
    }

    public function show(Project $project)
    {
        return redirect()->route('admin.projects.edit', $project);
    }

    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'short_desc'  => 'required|max:255',
            'full_desc'   => 'required',
            'tech_stack'  => 'required',
            'category_id' => 'required|exists:categories,id',
            'github_url'  => 'nullable|url',
            'live_url'    => 'nullable|url',
            'thumbnail'   => 'nullable|image|max:2048',
            'order'       => 'integer',
        ]);

        $data = $request->except(['thumbnail', 'tech_stack']);
        $data['slug']       = Str::slug($request->title);
        $data['tech_stack'] = array_map('trim', explode(',', $request->tech_stack));
        $data['featured']   = $request->boolean('featured');

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $file = $request->file('thumbnail');
            if (class_exists(ImageManager::class)) {
                $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $img = $manager->decodePath($file->getRealPath());
                $img->modify(new \Intervention\Image\Modifiers\OrientModifier());
                $img->modify(new \Intervention\Image\Modifiers\CoverModifier(1200, 800));

                $filename = uniqid().'_'.time().'.webp';
                $path = 'projects/' . $filename;
                $encoded = $img->encodeUsingFormat(Format::WEBP, quality: 80);
                Storage::disk('public')->put($path, (string) $encoded);
                $data['thumbnail'] = $path;
            } else {
                $data['thumbnail'] = $file->store('projects', 'public');
            }
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour !');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail) {
            Storage::disk('public')->delete($project->thumbnail);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé !');
    }
}
