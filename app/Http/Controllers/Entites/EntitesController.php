<?php

namespace App\Http\Controllers\Entites;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestEntite;
use App\Models\Entites;
use DB;
use Exception;
class EntitesController extends Controller  
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('admin.Entites.index',[
            'entites' => Entites::all()
        ]);
        // return redirect()->route('entites.index', ['entites' => Entites::all()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Entites.create',[
            'entites' =>  new Entites,
            "Organisation" => Entites::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
  

    public function store(RequestEntite $request)
        {
            
            $entity = new Entites();

            if ($request->input('parent_id')) {
                $parentId = $request->input('parent_id');

                if ($parentId < $entity->id) {
                    throw new Exception('L\'entité parent ne peut pas être une entité enfant.');
                }

                $entity->code = $request->code;
                $entity->libelle = $request->libelle;
                $entity->description = $request->description;
                $entity->parent()->associate($request->input('parent_id'));
                $entity->save();
            } else {
                $entity->fill($request->validated());
                $entity->save();
            }

            return redirect()->route('entites.index', ['entites' => Entites::all()]);
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
        $entites = Entites::find($id);
      
    
        return redirect()->route('entites.create',[
            'entites' =>  $entites
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestEntite $request, string $id)
    {
        $entites = Entites::find($id);
        $entites->update($request->validated());
        return redirect()->route('entites.index',[
            'entites' =>  Entites::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entites =  Entites::find($id);
        $entites->delete();
        return redirect()->route('entites.index',[
            'entites' =>  Entites::all()
        ]);

    }

    public function delete($id)
    {
        Entites::find($id)->delete();
        return redirect()->route('entites.index',[
            'entites' =>  Entites::all()
        ]);
    }
}
