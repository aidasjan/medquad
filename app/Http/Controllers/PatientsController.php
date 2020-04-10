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

    public function createInit()
    {	
        return view('pages.patient.create_init');
    }

    public function storeInit(Request $request)
    {	
        dd($request->all());
        return redirect('/patients/add/main');
    }

    public function createMain(Request $request)
    {	
        return view('pages.patient.create_main');
    }

    public function storeMain(Request $request)
    {	
        dd($request->all());
    }


}
