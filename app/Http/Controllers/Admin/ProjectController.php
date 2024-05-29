<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Models\Project;
use Carbon\Carbon;

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
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $form_data = $request->all();

            $new_project = new Project();
            $new_project->name = $form_data['name'];
            $new_project->slug = Helper::generateSlug($form_data['name'], new Project());
            $new_project->category = $form_data['category'];
            $new_project->description = $form_data['description'];
            $new_project->created = Carbon::today();
            $new_project->type_id = rand(1,8);
            dd($new_project);
            $new_project->save();


            return redirect()->route('admin.projects.index')->with('success', 'Progetto creato correttamente');
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
