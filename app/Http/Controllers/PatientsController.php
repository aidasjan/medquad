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
        if($patient->isCritical()){
            return redirect('/categories/blue');
        }
        return redirect('/patients'.'/'.$patient->id.'/add/main/');
    }

    public function createMain(Request $request, $id)
    {
        $patient = Patient::find($id);
        return view('pages.patient.create_main')->with('patient', $patient);
    }

    public function storeMain(Request $request, $id)
    {	
        $patient = Patient::find($id);
        $patient->best_eye_response = $request->best_eye_response;
        $patient->best_verbal_response = $request->best_verbal_response;
        $patient->best_motor_response = $request->best_motor_response;
        $patient->pao2_fio2 = $request->pao2_fio2;
        $patient->platelets = $request->platelets;
        $patient->bilirubin = $request->bilirubin;
        $patient->mabp = $request->mabp;
        $patient->dopamine = $request->dopamine;
        $patient->epinephrine = $request->epinephrine;
        $patient->norepinephrine = $request->norepinephrine;
        $patient->creatinine = $request->creatinine;
        $patient->at_least_one_organ_failure = $request->at_least_one_organ_failure ? true : false;
        $patient->save();
        $group = $patient->getGroup();
        return redirect('/categories'.'/'.$patient->getGroupNameByNumber($group));
    }


}
