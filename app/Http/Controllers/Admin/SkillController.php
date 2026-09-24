<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('sort_order')->get();
        $categories = Skill::CATEGORIES;

        return view('admin.skills.index', compact('skills', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:50'],
            'category' => ['required', 'string', 'in:'.implode(',', Skill::CATEGORIES)],
            'level' => ['required', 'integer', 'between:0,100'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? Skill::max('sort_order') + 1;

        Skill::create($data);

        return back()->with('success', 'Skill berhasil ditambahkan.');
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:50'],
            'category' => ['required', 'string', 'in:'.implode(',', Skill::CATEGORIES)],
            'level' => ['required', 'integer', 'between:0,100'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $skill->update($data);

        return back()->with('success', 'Skill berhasil diperbarui.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return back()->with('success', 'Skill berhasil dihapus.');
    }
}
