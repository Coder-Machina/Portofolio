<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::ordered()->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        $groups = Skill::select('group')->distinct()->orderBy('group')->pluck('group');
        return view('admin.skills.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'level' => 'required|integer|min:1|max:5',
            'group' => 'required|string|max:255',
            'order' => 'required|integer',
            'icon' => 'nullable|string|max:255',
        ]);

        Skill::create($data);

        return redirect()->route('admin.skills.index')->with('success', 'Compétence créée !');
    }

    public function edit(Skill $skill)
    {
        $groups = Skill::select('group')->distinct()->orderBy('group')->pluck('group');
        return view('admin.skills.edit', compact('skill', 'groups'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'level' => 'required|integer|min:1|max:5',
            'group' => 'required|string|max:255',
            'order' => 'required|integer',
            'icon' => 'nullable|string|max:255',
        ]);

        $skill->update($data);

        return redirect()->route('admin.skills.index')->with('success', 'Compétence mise à jour !');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Compétence supprimée !');
    }
}
