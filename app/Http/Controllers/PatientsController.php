<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientsController extends Controller
{

    public function index()
    {
        $patients = Patient::all();	
        return view('pages.patient.index')->with("patients", $patients);
    }

    public function createInit()
    {	
        return view('pages.patient.create_init');
    }

    public function storeInit(Request $request)
    {	
        if($request->cardiac_arrest || $request->irreversible_hypotension || 
            $request->motor_response || $request->severe_burn || 
            $request->other_mortality_conditions)
        {
            return redirect('/categories/blue');
        }
        $patient = new Patient;
        $patient->cardiac_arrest = $request->cardiac_arrest ? true : false;
        $patient->irreversible_hypotension = $request->irreversible_hypotension ? true : false;
        $patient->motor_response = $request->motor_response ? true : false;
        $patient->severe_burn = $request->severe_burn ? true : false;
        $patient->other_mortality_conditions = $request->other_mortality_conditions ? true : false;
        $patient->name = $request->name;
        $patient->surname = $request->surname;
        $patient->age = $request->age;
        $patient->save();
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
