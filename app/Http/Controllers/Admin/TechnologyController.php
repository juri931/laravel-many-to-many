<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technology = Technology::all();
        return view('admin.technologies.index', compact('technology'));
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
        $exists = Technology::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->route('admin.technologies.index')->with('error', 'Tecnologia già esistente');
        }else{
            $new = new Technology();
            $new->name = $request->name;
            $new->slug = Helper::generateSlug($new->name, Technology::class);
            $new->save();

            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia creata correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, Technology $technology)
    {
        $val_data = $request->validate([
            'name' => 'required|min:2|max:20',
        ],[
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve avere almeno 2 caratteri',
            'name.max' => 'Il nome deve avere al massimo 20 caratteri',
        ]);

        $exists = Technology::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->route('admin.technologies.index')->with('error', 'Tecnologia già esistente');
        }else{
            $val_data['slug'] = Helper::generateSlug($request->name, Technology::class);
            $technology->update($val_data);

            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia modificata correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia eliminata correttamente');
    }
}