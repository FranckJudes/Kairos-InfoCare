<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;

use App\Models\Patients;
use App\Models\PlanClassement;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patients::all();
        return view('admin.Patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Patients.create',[
            'patients' => new Patients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // $credentials =  $request->validated();
        //
        //  dd($request);
        $patient = new Patients;
        $patient->titrePatient = $request->titrePatient;
        $patient->name = $request->name;
        $patient->lastname =  $request->lastname;
        $patient->dateNaissance =  $request->dateNaissance;
        $patient->sexe =  $request->sexe;
        $patient->cni =  $request->cni;
        $patient->numeroTelephone =  $request->numeroTelephone;
        $patient->IdentiteGenre =  $request->IdentiteGenre;
        $patient->OrientationSexuel =  $request->OrientationSexuel;
        $patient->adresse =  $request->adresse;
        $patient->codePostal =  $request->codePostal;
        $patient->nomMere =  $request->nomMere;
        $patient->region =  $request->region;
        $patient->TelephoneUrgence =  $request->TelephoneUrgence;
        $patient->TelephoneProfessionel =  $request->TelephoneProfessionel;

        $patient->emailDuContact = $request->emailDuContact;
        $patient->AntecedentMedicaux = $request->AntecedentMedicaux;
        $patient->allergie =  $request->allergie;
        $patient->chirugieAnterieurs =  $request->chirugieAnterieurs;
        $patient->MedicamentsActuel =  $request->MedicamentsActuel;
        $patient->ProblemeSante =  $request->ProblemeSante;
        $patient->HistoriqueVaccination =  $request->HistoriqueVaccination;
        $patient->resultatTestMedicaux =  $request->resultatTestMedicaux;
        $patient->nomEmployeur =  $request->nomEmployeur;
        $patient->dateDeces =  $request->dateDeces;
        $patient->raisonDeces =  $request->raisonDeces;
        $patient->nomGuardian =  $request->nomGuardian;
        $patient->LienParent =  $request->LienParent;
        $patient->sexeParente =  $request->sexeParente;

        $patient->AdresseLienParente = $request->AdresseLienParente;
        $patient->TelephoneProfessionelLienParente = $request->TelephoneProfessionelLienParente;
        $patient->CourrielLienParente =  $request->CourrielLienParente;
        $patient->villeLienParente =  $request->villeLienParente;
        $patient->codePostalLienParente =  $request->codePostalLienParente;
        $patient->numeroPoliceAssurance =  $request->numeroPoliceAssurance;
        $patient->detailAssuranceMedicale =  $request->detailAssuranceMedicale;
        $patient->dateExpirationAssurance =  $request->dateExpirationAssurance;
        $patient->coordonneAssurance =  $request->coordonneAssurance;

        
        Toastr::success('Mise a jour reussi', 'Succès');
        $patient->save();
        
        return view('admin.Patients.index',[
            'patients' => Patients::all()
        ]);
       
    }

    /**
     * Display the specified resource.
     */
    public function show($patients)
    {
        // $patient = Patients::with(['plan_classement.patientFiles' => function ($query) use ($patients) {
        //     $query->where('patients_id', $patients);
        // }])->find($patients);

        //  return $patient ;
        $patients = Patients::find($patients);
              return view('admin.Patients.show',[
            'patients' =>  $patients->id
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($patients)
    {       
        return view('admin.Patients.create',[
            'patients' =>Patients::find($patients)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patients $patient)
    {
        $patient->nomPrenoms = $request->nomPrenoms;
        $patient->dateNaissance = $request->dateNaissance;
        $patient->sexe =  $request->sexe;
        $patient-> adresseMail =  $request->email;
        $patient->numeroTelephone =  $request->numeroTelephone;
        $patient->quartier =  $request->quartier;
        $patient->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patients $patients)
    {
        $patients->delete();
    }

    public function delete($id){
        
        try {
            Patients::find($id)->delete();
            Toastr::success('Suppression avec success', 'Succès');
            return  view('admin.Patients.index',[
                'patients' =>  Patients::all()
            ]);
            
        } catch (\Throwable $th) {
            Toastr::error('Echec de suppression', 'Succès');

        } 
    }

   
}
