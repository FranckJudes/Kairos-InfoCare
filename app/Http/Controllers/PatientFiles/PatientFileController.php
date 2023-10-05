<?php

namespace App\Http\Controllers\PatientFiles;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Http\Request;
use App\Models\PatientFiles;
use Illuminate\Support\Facades\File;
use Spatie\PdfToImage\Pdf;
use Brian2694\Toastr\Facades\Toastr;

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
    // public function store(Request $request)
    // {

    //     $profileImage = $request->file('file');
    //     $imageName = $profileImage->getClientOriginalName();
    //     $profileImagePath = $profileImage->store('Dossiers_Patients', 'public');

        
    //     $patientFile =  new PatientFiles;

    //     // 
    //     $pdf = new Pdf($profileImagePath);

    //     // Convertir le PDF en images dans un répertoire temporaire
    //     $images = $pdf->saveAllPages(storage_path('app/temp_images'));

    //     // Compter le nombre d'images générées, ce qui équivaut au nombre de pages du PDF
    //     $numberOfPages = count($images);

    //     // Supprimer les images temporaires si nécessaire
    //     foreach ($images as $image) {
    //         unlink($image);
    //     }



    //     $filePath = storage_path($profileImagePath); // Remplacez par le chemin de votre fichier PDF
    //     $pageCount = $this->countPages($filePath);

    //     $fileSize = filesize($filePath);
    //     $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    //     $fileSizeReadable = $fileSize > 0 ? round($fileSize / pow(1024, ($i = floor(log($fileSize, 1024)))), 2) . ' ' . $units[$i] : '0 B';



    //     $patientFile-> patients_id = $request->patient_id;
    //     $patientFile-> plan_classement_id = $request->id_planClassement;
    //     $patientFile->filename = $imageName;
    //     $patientFile->filepath = $profileImagePath;
    //     $patientFile->countPage = $pageCount;
    //     $patientFile->filesize =  $fileSize.''.$fileSizeReadable;
    //     $patientFile->save();

    //     // return $request;
    // }


    public function store(Request $request)
    {

        try {
        $profileImage = $request->file('file');
        $imageName = $profileImage->getClientOriginalName();
        $profileImagePath = $profileImage->store('Dossiers_Patients', 'public');

        $patientFile = new PatientFiles;

        $pdf = new Pdf('storage/'.$profileImagePath);


        $numberOfPages = $pdf->getNumberOfPages(); 



        $patientFile->patients_id = $request->patient_id;
        $patientFile->plan_classement_id = $request->id_planClassement;
        $patientFile->filename = $imageName;
        $patientFile->filepath = $profileImagePath;
        $patientFile->countPage = $numberOfPages; // Utilisez la variable $numberOfPages
        $patientFile->filesize = $request->filesize; // Utilisez directement la taille du fichier
            
        $patientFile->save();
        
 

        } catch (\Throwable $th) {
            //throw $th;
            Toastr::error('Echec d\'enregistrement', 'Succès');
            
        }
      

        // Retournez la réponse appropriée ici
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
        // Récupérez le chemin du fichier PDF en fonction de l'ID
        $file =  PatientFiles::find($id);
        $filePath = 'storage/'. $file->filepath;
        
    // Vérifiez si le fichier existe
            if (File::exists($filePath)) {

                File::delete($filePath);
                $file->delete();
                
                return redirect()->back();
            } else {
                // Gérez le cas où le fichier n'existe pas
                return response()->json(['message' => 'Fichier introuvable.',
                    'filepath' => $filePath
            ]);
            }
    }


    // public function getDossierPatient($id)
    // {
    //     // Récupérez le patient avec ses relations
    //    $patient = Patients::with(['plan_classement.patientFiles' => function ($query) use ($id) {
    //     $query->where('patients_id', $id);
    // }])->find($id);
    
    //     // Vérifiez si le patient existe
    //     if (!$patient) {
    //         return response()->json(['treeData' => []]);
    //     }
    
    //     $customIcons = [
    //         'dossier' => asset('/assets/Ztree/css/zTreeStyle/img/diy/folder.png'),
    //         'fichier' => asset('/assets/Ztree/css/zTreeStyle/img/diy/2.png'),
    //     ];
    
    //     $treeData = [];
    
    //     // Créez le nœud du patient
    //     $patientNode = [
    //         'id' => $patient->id,
    //         'pId' => 0, // L'ID du parent, 0 signifie que c'est un nœud racine
    //         'name' => 'Dossier de ' . $patient->name . ' ' . $patient->lastname,
    //         'type' => 'dossier',
    //     ];
    
    //     $treeData[] = $patientNode;
    
    //     // Parcourez les plans de classement du patient
    //     foreach ($patient->plan_classement as $planClassement) {
    //         $parentNodeId = ($planClassement->parent_id != null) ? $planClassement->parent_id : $patient->id;
    
    //         // Créez le nœud du dossier
    //         $dossierNode = [
    //             'id' => $planClassement->id,
    //             'pId' => $parentNodeId,
    //             'name' => $planClassement->libelle,
    //             'type' => 'dossier',
    //             'icon' => $customIcons['dossier'],
    //         ];
    
    //         $treeData[] = $dossierNode;
    
    //         // Parcourez les fichiers du dossier
    //         foreach ($planClassement->patientFiles as $patientFile) {
    //             // Créez le nœud du fichier
    //             $fichierNode = [
    //                 'id' => $patientFile->id,
    //                 'pId' => $planClassement->id, // L'ID du parent est l'ID du dossier
    //                 'name' => $patientFile->filename,
    //                 'type' => 'fichier',
    //                 'icon' => $customIcons['fichier'],
    //             ];
    
    //             $treeData[] = $fichierNode;
    //         }
    //     }
    
    //     return response()->json(['treeData' => $treeData]);
    // }


    public function getPatientFile(Request $request)
    {
        $output = "";
    
        $notes = PatientFiles::where('patients_id', $request->id_patient)
                            ->where('plan_classement_id', $request->id_Noeud)
                            ->get();


        foreach ($notes as $note) {
            $output .=
                '<tr>
                    <td>
                        ' . $note->id . '
                    </td>
                    <td>
                        ' . $note->filename . '
                    </td>
                    <td>
                        ' . $note->filesize . '
                    </td>
                    <td>
                        ' . $note->countPage . '
                    </td>
                    <td>
                        <a href="' . route('patient.show', $note->id) . '" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="material-icons">remove_red_eye</i></a>
                        <a href="' . url('deletePatientFiles', $note->id) . '"><i class="material-icons">delete</i></a>
                    </td>
                </tr>';
                    }
                    
        return response($output);
    }
    

    public function afficherPDF($id)
    {
        $file =  PatientFiles::findOrFail($id);

        $filePath = 'storage/'. $file->filepath;

            // Vérifiez si le fichier existe
            if (File::exists($filePath)) {
                // Lisez le contenu du PDF et renvoyez-le comme une réponse de fichier PDF
                return response()->file($filePath);
            }

            // Gérez le cas où le fichier n'existe pas
            return response()->file($filePath);
    }
    

    
    

}