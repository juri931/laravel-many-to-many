<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();
        return view('admin.projects.index', compact('project'));
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
        $exists = Project::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->route('admin.projects.index')->with('error', 'Progetto già esistente');
        }else{
            $new = new Project();
            $new->name = $request->name;
            $new->slug = Helper::generateSlug($new->name, Project::class);
            $new->save();

            return redirect()->route('admin.projects.index')->with('success', 'Progetto creato correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
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
    public function update(Request $request, Project $project)
    {
        $val_data = $request->validate([
            'name' => 'required|min:2|max:20',
        ],[
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve avere almeno 2 caratteri',
            'name.max' => 'Il nome deve avere al massimo 20 caratteri',
        ]);

        $exists = Project::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->route('admin.projects.index')->with('error', 'Progetto già esistente');
        }else{
            $val_data['slug'] = Helper::generateSlug($request->name, Project::class);
            $project->update($val_data);

            return redirect()->route('admin.projects.index')->with('success', 'Progetto modificato correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato correttamente');
    }
}
