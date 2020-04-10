<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientsController extends Controller
{

   public function index()
   {
       $patients = Patient::all();	
       return view('pages.patients.index')->with($patients);
   }

   // GET
   public function createInit()
   {	
       return view('pages.patient.create_init');
   }

   // POST
   public function storeInit(Request $request)
   {	
       dd($request->name);
       return redirect('/patients/add/main');
   }

    // POST
    public function createMain(Request $request)
    {	
        return view('pages.patient.create_main');
    }

   // POST
   public function storeMain(Request $request)
   {	
       dd($request->all());
   }


}
