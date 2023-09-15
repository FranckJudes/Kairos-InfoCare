<?php

namespace App\Http\Controllers\Utilisateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUtilisateur;
use App\Models\Entites;
use App\Models\Groupes;
use App\Models\Passwords;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =  User::all();
        
       
        return view('admin.Utilisateur.index',[
            'Utilisateur' => User::all()
        ]);
        // return redirect()->route('Utilisateur.index', ['Utilisateurs' => User::all()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Utilisateur.create', [
            'Utilisateur' => new User,
            "Organisation" => Entites::all(),
            "groupes" => Groupes::all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $request = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'sexe' => 'required',
            'cni'  => 'required',
            'telephone' => 'required',
            'dateNaissance' => ['required','date'],
            'lieuNaissance' => 'required',
            'email' => 'required|unique',
            'entite_id' => 'nullable',
            'photo' => ['nullable','mimes:jpg,bmp,png,jpeg,pgp,*'],
            'organisation' => 'nullable'
        ]);
        $passTmp = Passwords::find(1);
        $defaultPassword = $passTmp->valeur;
       
        try {
            $Utilisateurs = new User;

            if($request->has('photo')) {
                $profileImage = $request->file('photo');
                $profileImagePath = $profileImage->store('profile_images', 'public');
                $Utilisateurs->name = $request->name;
                $Utilisateurs->lastname = $request->lastname;
                $Utilisateurs->sexe = $request->sexe;
                $Utilisateurs->cni = $request->cni;
                $Utilisateurs->lastname = $request->lastname;
                $Utilisateurs->telephone = $request->telephone;
                $Utilisateurs->lieuNaissance = $request->lieuNaissance;
                $Utilisateurs->dateNaissance = $request->dateNaissance;
                $Utilisateurs->email = $request->email;
                $Utilisateurs->password = Hash::make($defaultPassword);
                $Utilisateurs->photo = $profileImagePath;
                $Utilisateurs->save();
            }else {
                $Utilisateurs->name = $request->name;
            $Utilisateurs->lastname = $request->lastname;
            $Utilisateurs->sexe = $request->sexe;
            $Utilisateurs->cni = $request->cni;
            $Utilisateurs->lastname = $request->lastname;
            $Utilisateurs->telephone = $request->telephone;
            $Utilisateurs->lieuNaissance = $request->lieuNaissance;
            $Utilisateurs->dateNaissance = $request->dateNaissance;
            $Utilisateurs->email = $request->email;
            $Utilisateurs->password =Hash::make($defaultPassword);
            // $Utilisateurs->photo = $profileImagePath;
            $Utilisateurs->save();
    
            }
    
    
                if($request->organisation != null){
                    
                    foreach($request->organisation as $orga)
                    {
                        $Utilisateurs->entite()->attach($orga);
                        $Utilisateurs->save();
    
                    }
                }
    
                if($request->groupes != null){
                    
                    foreach($request->groupes as $orga)
                    {
                        $Utilisateurs->groupeUtilisateur()->attach($orga);
                        $Utilisateurs->save();
    
                    }
                }
                Toastr::success('Creation avec success', 'Title', ["positionClass" => "toast-top-right"]);
                return redirect()->route('Utilisateur.index', ['Utilisateurs' => User::all()]);
        } catch (\Throwable $th) {
            Toastr::error('Echec de Creation', 'Title', ["positionClass" => "toast-top-right"]);
            return view('admin.Utilisateur.create', [
                'Utilisateur' => new User,
                "Organisation" => Entites::all(),
                "groupes" => Groupes::all()
            ]);

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
        $Utilisateur = User::find($id);
         
        $Organisation = Entites::all();
       
        return view('admin.Utilisateur.create',[
            'Utilisateur' =>  $Utilisateur,
            'Organisation' => $Organisation,
            "groupes" => Groupes::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        // $request->validate([
        //     'name' => 'required',
        //     'lastname' => 'required',
        //     'sexe' => 'required',
        //     'cni'  => 'required',
        //     'telephone' => 'required',
        //     'dateNaissance' => ['required','date'],
        //     'lieuNaissance' => 'required',
        //     'email' => 'required|unique',
        //     'entite_id' => 'nullable',
        //     'photo' => ['nullable','mimes:jpg,bmp,png,jpeg,pgp,*'],
        //     'organisation' => 'nullable'
        // ]);


        try {
            $Utilisateurs =  User::find($id);
        
            $Utilisateurs->name = $request->name;
            $Utilisateurs->lastname = $request->lastname;
            $Utilisateurs->sexe = $request->sexe;
            $Utilisateurs->cni = $request->cni;
            $Utilisateurs->lastname = $request->lastname;
            $Utilisateurs->telephone = $request->telephone;
            $Utilisateurs->lieuNaissance = $request->lieuNaissance;
            $Utilisateurs->dateNaissance = $request->dateNaissance;
            $Utilisateurs->email = $request->email;
            $Utilisateurs->save();
            
            if($request->hasFile('photo')) {
                $profileImage = $request->file('photo');
                $profileImagePath = $profileImage->store('profile_images', 'public');
                $Utilisateurs->photo = $profileImagePath;
                $Utilisateurs->save();
            }
            
            $Utilisateurs->entite()->detach();
            $Utilisateurs->groupeUtilisateur()->detach();

            if($request->organisation != null){
                
                foreach($request->organisation as $orga)
                {
                    $Utilisateurs->entite()->attach($orga);
                    $Utilisateurs->save();

                }
            }
            if($request->groupes != null){
                
                foreach($request->groupes as $orga)
                {
                    $Utilisateurs->groupeUtilisateur()->attach($orga);
                    $Utilisateurs->save();

                }
            }
            Toastr::success('Mise a jout avec success', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect()->route('Utilisateur.index', ['Utilisateurs' => User::all()]);
        } catch (\Throwable $th) {
            Toastr::error('Echec de Creation', 'Title', ["positionClass" => "toast-top-right"]);
            $Utilisateur = User::find($id);
         
            $Organisation = Entites::all();
       
            return view('admin.Utilisateur.create',[
                'Utilisateur' =>  $Utilisateur,
                'Organisation' => $Organisation,
                "groupes" => Groupes::all()
            ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Utilisateurs =  User::find($id);

        $Utilisateurs->entite()->detach();

        $Utilisateurs->delete();

        return redirect()->route('Utilisateur.index', ['Utilisateurs' => User::all()]);

    }

    public function delete($id)
    {
        $Utilisateurs =  User::find($id);

        $Utilisateurs->entite()->detach();
        $Utilisateurs->groupeUtilisateur()->detach();

        $Utilisateurs->delete();
        Toastr::success('Suppression avec success', 'Title', ["positionClass" => "toast-top-right"]);


        return redirect()->route('Utilisateur.index', ['Utilisateurs' => User::all()]);

    }
    
}
