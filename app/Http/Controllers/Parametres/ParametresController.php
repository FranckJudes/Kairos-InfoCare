<?php

namespace App\Http\Controllers\Parametres;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParametresController extends Controller
{
    public function index(){
        
        return view('admin.Parametres.index');
    }
}
