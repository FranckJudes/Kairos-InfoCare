<?php

namespace App\Http\Controllers\PasswordDefaut;

use App\Http\Controllers\Controller;
use App\Models\Passwords;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Passwords.index',[
            'Passwords' => Passwords::all()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Passwords $passwords)
    {
        return view('admin.Passwords.update',[
            'Passwords' => $passwords
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Password = Passwords::find($id);
      
    
        return view('admin.Passwords.update',[
            'Password' =>  $Password
        ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $passwords)
    {
         $password = Passwords::find();

         $password->valeur = $request->valeur;

         Toastr::success('Mise a jour reussi', 'Succès');
         return view('admin.Passwords.index',[  
            'Passwords' => Passwords::all()
        ]);
         
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

    public function updatePassword(Request $request){
       $pass =  Passwords::find(1);

       $pass->update([
            'valeur' => $request->valeur
       ]);

          return view('admin.Passwords.index',[
        'Passwords' => Passwords::all()
          ]);
    }


}
