<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::withCount('projects')->get();
        $projects = Project::with('category')->when(request('category'), function ($query) {
            $query->whereHas('category', fn($q) => $q->where('slug', request('category')));
        })
        ->ordered()
        ->get();

        return view('projects.index', compact('projects', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug) {
        $project = Project::with('category')->where('slug', $slug)->firstOrFail();
         $related = Project::with('category')->where('category_id', $project->category_id)->where('id', '!=', $project->id)->ordered()->take(3)->get();

    return view('projects.show', compact('project', 'related'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
