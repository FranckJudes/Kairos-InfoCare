<?php

namespace App\Http\Controllers\GroupeUtilisateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestGroupe;
use App\Models\Groupes;
use Illuminate\Http\Request;

class GroupeUtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        // $groupeUtilisateur = Groupes::all();
        return view('admin.GroupeUtilisateur.index',[
            'groupeUtilisateur' => Groupes::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.GroupeUtilisateur.create',[
            'groupeUtilisateur' => new Groupes 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestGroupe $request)
    {
        $request = $request->validate([
            'libelle' =>'required',
            'description' => 'required',
      ]);
    
        $groupe = new Groupes;
        $groupe->libelle = $request['libelle'];
        $groupe->description =  $request['description'];
        $groupe->save();

        return view('admin.GroupeUtilisateur.index',[
            'groupeUtilisateur' => Groupes::all()
        ]);
        
    }

    /**
     * Display the specified resource.
*/
    public function show(Groupes $groupeUtilisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groupeUtilisateur = Groupes::find($id);
      
    
        return view('admin.GroupeUtilisateur.create',[
            'groupeUtilisateur' =>  $groupeUtilisateur
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestGroupe $request, string $id)
    {
        $groupeUtilisateur = Groupes::find($id);
        $groupeUtilisateur->update($request->validated());
        return view('admin.GroupeUtilisateur.index',[
            'groupeUtilisateur' => Groupes::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string  $id)
    {
        
        $groupeUtilisateur =  Groupes::find($id);
        $groupeUtilisateur->delete();
        return view('admin.GroupeUtilisateur.index',[
            'groupeUtilisateur' => Groupes::all()
        ]); 
    }
}
