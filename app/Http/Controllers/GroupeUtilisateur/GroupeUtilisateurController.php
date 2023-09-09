<?php

namespace App\Http\Controllers\GroupeUtilisateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestGroupe;
use App\Models\Groupes;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class GroupeUtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        // $groupesAvecNombreUtilisateurs = Groupes::withCount('users')->get();
        return view('admin.GroupeUtilisateur.index',[
            'groupeUtilisateur' => Groupes::all(),
            'groupesAvecNombreUtilisateurs' => Groupes::withCount('users')->get()
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
      
      try {
          $groupe = new Groupes;
          $groupe->libelle = $request['libelle'];
          $groupe->description =  $request['description'];
          $groupe->save();
        
          Toastr::success('Creation avec succes', 'Succès');
          return view('admin.GroupeUtilisateur.index',[
              'groupeUtilisateur' => Groupes::all(),
              'groupesAvecNombreUtilisateurs' => Groupes::withCount('users')->get()
          ]);
        
      } catch (\Throwable $th) {
        Toastr::error('Echec de Creation', 'Succès');

      }
        
    }

    /**
     * Display the specified resource.
*/
    public function show(string $groupeUtilisateur)
    {
        $groupe = Groupes::findOrFail($groupeUtilisateur);

        $utilisateursDuGroupe = $groupe->users;
        
        return view('admin.GroupeUtilisateur.show',[
            'groupeAvecNombreUtilisateurs' => $groupe->loadCount('users'),
            'utilisateursDuGroupe' => $utilisateursDuGroupe

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groupeUtilisateur = Groupes::find($id);
        
       
        return view('admin.GroupeUtilisateur.create',[
            'groupeUtilisateur' =>  $groupeUtilisateur,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestGroupe $request, string $id)
    {
        $groupeUtilisateur = Groupes::find($id);
        try {
            //code...
            $groupeUtilisateur->update($request->validated());
            Toastr::success('Mise a jour avec succes', 'Success');
            return view('admin.GroupeUtilisateur.index',[
                'groupeUtilisateur' => Groupes::all(),
                'groupesAvecNombreUtilisateurs' => Groupes::withCount('users')->get()
            ]);
        } catch (\Throwable $th) {
            Toastr::error('Erreur de mise a jour', 'Succès');

        }   
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

    public function delete($id)
    {
        Groupes::find($id)->delete();
        
        return view('admin.GroupeUtilisateur.index',[
            'groupeUtilisateur' => Groupes::all(),
            'groupesAvecNombreUtilisateurs' => Groupes::withCount('users')->get()
        ]); 
    }
}
