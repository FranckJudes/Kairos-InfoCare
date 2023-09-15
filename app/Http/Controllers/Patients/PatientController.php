<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestPatient;
use App\Models\Patients;
use Illuminate\Http\Request;

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
            'Patients' => new Patients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestPatient $request)
    {
        $credentials =  $request->validated();
        //
        // dd($request);
        // $patient = new Patients;
        // $patient->nomPrenoms = $request->nomPrenoms;
        // $patient->dateNaissance = $request->dateNaissance;
        // $patient->sexe =  $request->sexe;
        // $patient-> adresseMail =  $request->adresseMail;
        // $patient->numeroTelephone =  $request->numeroTelephone;
        // $patient->quartier =  $request->quartier;

        // $patient->save();
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Patients $patients)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($patients)
    {       
        $Patients =  Patients::find($patients);
        return view('admin.Patients.create',[
            'Patients' => $patients
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
}
