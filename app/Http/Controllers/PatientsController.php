<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientsController extends Controller
{

   public function index()
   {
       $patients = Patient::all();	
       return view('pages.index')->with($data);
   }

}
