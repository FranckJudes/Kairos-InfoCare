<?php

namespace App\Http\Controllers\PatientFiles;

use App\Http\Controllers\Controller;
use App\Models\PatientFiles;
use App\Models\Patients;
use Illuminate\Http\Request;

class PatientFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patientFile =  new PatientFiles;

        $profileImage = $request->file('file');
        $imageName = $profileImage->getClientOriginalName();
        $profileImagePath = $profileImage->store('Dossiers_Patients', 'public');


        $patientFile-> patients_id = $request->patient_id;
        $patientFile-> plan_classement_id = $request->id_planClassement;
        $patientFile->filename = $imageName;
        $patientFile->filepath = $profileImagePath;
        $patientFile->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id){

        $patientFile = PatientFiles::find($id);
        $patientFile->delete();

        return redirect()->back();
    }

    public function getEntitesFilePatients()
    {
        $customIcons = [
            'dossier' => asset('/assets/Ztree/css/zTreeStyle/img/diy/folder.png'),
            'fichier' => asset('/assets/Ztree/css/zTreeStyle/img/diy/2.png'),
        ];
        $entites = PlanClassement::all();

        $treeData = [];
        foreach ($entites as $entite) {
            if ($entite->type == 'dossier') {
   
                $treeData[] = [
                    'id'   => $entite->id,
                    'pId' => $entite->parent_id,
                    'name' => $entite->libelle,
                    'type' => $entite->type,
                    'icon'=> $customIcons['dossier']
                ];
            }else {
                $treeData[] = [
                    'id' => $entite->id,
                    'pId' => $entite->parent_id,
                    'name' => $entite->libelle,
                    'type' => $entite->type,
                    'icon'=> $customIcons['fichier']
                ];
            }
        }
    
            return response()->json(['treeData' => $treeData]);

    }


 


    
    // public function getDossierPatient($id)
    // {
        
    // // Récupérez le patient avec ses relations
    // $patient = Patients::with(['plan_classement.patientFiles' => function ($query) use ($id) {
    //     $query->where('patients_id', $id);
    // }])->find($id);

    // // Vérifiez si le patient existe
    // if (!$patient) {
    //     return response()->json(['treeData' => []]);
    // }

    // $customIcons = [
    //     'dossier' => asset('/assets/Ztree/css/zTreeStyle/img/diy/folder.png'),
    //     'fichier' => asset('/assets/Ztree/css/zTreeStyle/img/diy/2.png'),
    // ];

    // $treeData = [];

    
    //     $patientNode = [
    //         'id' =>  $patient->id,
    //         'pId' => 0, // L'ID du parent, 0 signifie que c'est un nœud racine
    //         'name' => 'Dossier de '.$patient->name.' '.$patient->lastname ,
    //         'type' => 'dossier',
    //     ];
    
    //     $treeData[] = $patientNode;
    
    //     foreach ($patient->plan_classement  as $planClassement) {

    //         $parentNodeId = ($planClassement->parent_id != null) ? $planClassement->parent_id :$planClassement->parent_id['pId'] ;

    //                     $dossierNode = [
    //                         'id'   => $planClassement->id,
    //                         'pId' => $parentNodeId,
    //                         'name' => $planClassement->libelle,
    //                         'type' => $planClassement->type,
    //                         'icon'=> $customIcons['dossier']
    //                     ];
               
    //          }   
    
    //         $treeData[] = $dossierNode;
    
    //         foreach ($planClassement->patientFiles as $patientFile) {
    //             $fichierNode = [
    //                 'id' =>  $patientFile->id,
    //                 'pId' =>  $planClassement->id, // L'ID du parent est l'ID du dossier
    //                 'name' => $patientFile->filename,
    //                     'type' => 'fichier',
    //                     'icon' => $customIcons['fichier']
    //                 ];
        
    //                 $treeData[] = $fichierNode;
    //             }
            
    //             return response()->json(['treeData' => $treeData]);
    //     }
    public function getDossierPatient($id)
    {
        // Récupérez le patient avec ses relations
       $patient = Patients::with(['plan_classement.patientFiles' => function ($query) use ($id) {
        $query->where('patients_id', $id);
    }])->find($id);
    
        // Vérifiez si le patient existe
        if (!$patient) {
            return response()->json(['treeData' => []]);
        }
    
        $customIcons = [
            'dossier' => asset('/assets/Ztree/css/zTreeStyle/img/diy/folder.png'),
            'fichier' => asset('/assets/Ztree/css/zTreeStyle/img/diy/2.png'),
        ];
    
        $treeData = [];
    
        // Créez le nœud du patient
        // $patientNode = [
        //     'id' => $patient->id,
        //     'pId' => 0, // L'ID du parent, 0 signifie que c'est un nœud racine
        //     'name' => 'Dossier de ' . $patient->name . ' ' . $patient->lastname,
        //     'type' => 'dossier',
        // ];
    
        // $treeData[] = $patientNode;
    
        // Parcourez les plans de classement du patient
        foreach ($patient->plan_classement as $planClassement) {
            $parentNodeId = ($planClassement->parent_id != null) ? $planClassement->parent_id : $patient->id;
    
            // Créez le nœud du dossier
            $dossierNode = [
                'id' => $planClassement->id,
                'pId' => $parentNodeId,
                'name' => $planClassement->libelle,
                'type' => 'dossier',
                'icon' => $customIcons['dossier'],
            ];
    
            $treeData[] = $dossierNode;
    
            // Parcourez les fichiers du dossier
            foreach ($planClassement->patientFiles as $patientFile) {
                // Créez le nœud du fichier
                $fichierNode = [
                    'id' => $patientFile->id,
                    'pId' => $planClassement->id, // L'ID du parent est l'ID du dossier
                    'name' => $patientFile->filename,
                    'type' => 'fichier',
                    'icon' => $customIcons['fichier'],
                ];
    
                $treeData[] = $fichierNode;
            }
        }
    
        return response()->json(['treeData' => $treeData]);
    }
    

    }






