<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $patients = Patient::all()->where('group', '<>', null)->sortBy('group_value');
        return view('pages.patient.index')->with("patients", $patients);
    }

    public function indexBlue()
    {
        return view('categories.blue');
    }

    public function indexYellow()
    {
        return view('categories.yellow');
    }

    public function indexRed()
    {
        return view('categories.red');
    }

    public function indexGreen()
    {
        return view('categories.green');
    }

    public function createInit()
    {	
        return view('pages.patient.create_init');
    }

    public function storeInit(Request $request)
    {	
        if(Patient::count() > 500) return "Maximum patient number exceeded.";
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
            $patient->group_value = 3;
            $patient->group = $patient->getGroupNameByNumber(3);
            $patient->save();
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
        $group_value = $patient->getGroup();
        $sofa = $patient->getSOFAScore();
        $patient->group_value = $group_value;
        $patient->group = $patient->getGroupNameByNumber($group_value);
        $patient->save();
        
        return view('/categories'.'/'.$patient->group , ['sofa' => $sofa]);
        
    }

    public function destroy($id){
        $patient = Patient::find($id);
        $patient->delete();
        return redirect('/');
    }

    public function recreate(){
        $patients = Patient::all();
        foreach ($patients as $patient){
            $patient->delete();
        }
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (1, 'Callida', 'Woofendell', 57, 'blue', 3, false, false, false, false, false, 1, null, 5, 474, 16, 13.0, 51, 10, 0.06, 0.06, 4, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (2, 'Gardy', 'Kopje', 30, 'blue', 3, false, false, false, false, false, 3, null, 4, 234, 36, 8.5, 75, 3, 0.11, 0.05, 6, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (3, 'Candace', 'Raphael', 25, 'blue', 3, false, false, false, false, false, 3, null, 5, 191, 101, 4.1, 75, 12, 0.13, 0.07, 6, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (4, 'Darelle', 'Rentelll', 15, 'red', 1, false, false, false, false, false, 2, null, 6, 135, 57, 2.7, 56, 12, 0.17, 0.07, 5, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (5, 'Archie', 'Jaffa', 66, 'yellow', 2, false, false, false, false, false, 4, null, 3, 322, 44, 3.4, 68, 18, 0.06, 0.12, 6, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (6, 'Henrietta', 'Kingswold', 21, 'red', 1, false, false, false, false, false, 4, null, 5, 364, 78, 7.7, 64, 13, 0.12, 0.07, 3, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (7, 'Yoko', 'Castiglione', 74, 'green', 4, false, false, false, false, false, 3, null, 4, 266, 127, 12.0, 50, 18, 0.07, 0.09, 4, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (8, 'Douglas', 'Priestland', 82, 'yellow', 2, false, false, false, false, false, 2, null, 6, 117, 147, 3.6, 66, 6, 0.08, 0.1, 4, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (9, 'Wenona', 'Slowgrove', 51, 'blue', 3, false, false, false, false, false, 4, null, 1, 463, 33, 6.4, 64, 10, 0.19, 0.1, 4, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (10, 'Ely', 'Chesshire', 32, 'blue', 3, false, false, false, false, false, 1, null, 6, 75, 52, 10.6, 52, 3, 0.09, 0.11, 6, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (11, 'Fredericka', 'Smith', 57, 'yellow', 2, false, false, false, false, false, 1, null, 2, 129, 20, 12.9, 78, 10, 0.07, 0.14, 6, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (12, 'Giorgi', 'Meins', 17, 'blue', 3, false, false, false, false, false, 2, null, 4, 422, 68, 12.2, 77, 9, 0.05, 0.07, 5, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (13, 'Atlanta', 'Baynes', 37, 'yellow', 2, false, false, false, false, false, 4, null, 4, 218, 140, 4.8, 80, 16, 0.17, 0.14, 3, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (14, 'Jorrie', 'Jansa', 61, 'green', 4, false, false, false, false, false, 2, null, 6, 373, 80, 5.0, 61, 10, 0.16, 0.11, 1, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (15, 'Clarisse', 'Jewks', 79, 'yellow', 2, false, false, false, false, false, 4, null, 2, 358, 102, 10.0, 65, 12, 0.12, 0.07, 1, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (16, 'Celinda', 'Veschambes', 86, 'yellow', 2, false, false, false, false, false, 3, null, 3, 477, 29, 11.7, 61, 14, 0.19, 0.06, 1, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (17, 'Eolanda', 'Ramelot', 71, 'red', 1, false, false, false, false, false, 3, null, 6, 298, 142, 7.2, 65, 10, 0.2, 0.14, 3, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (18, 'Serge', 'Garnsey', 15, 'red', 1, false, false, false, false, false, 3, null, 1, 99, 36, 4.2, 79, 15, 0.13, 0.13, 1, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (19, 'Aldin', 'Ewdale', 37, 'yellow', 2, false, false, false, false, false, 2, null, 5, 204, 138, 7.0, 51, 9, 0.14, 0.06, 6, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (20, 'Anthia', 'Boother', 22, 'green', 4, false, false, false, false, false, 1, null, 2, 392, 147, 10.4, 68, 12, 0.14, 0.06, 6, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (21, 'Dare', 'Van Weedenburg', 41, 'blue', 3, false, false, false, false, false, 2, null, 3, 404, 101, 5.8, 53, 4, 0.17, 0.09, 1, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (22, 'Kermie', 'Flather', 82, 'green', 4, false, false, false, false, false, 1, null, 6, 400, 41, 9.4, 60, 10, 0.16, 0.09, 2, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (23, 'Jeri', 'Wellman', 54, 'green', 4, false, false, false, false, false, 1, null, 1, 474, 152, 8.6, 75, 18, 0.11, 0.1, 4, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (24, 'Marietta', 'Peltz', 19, 'green', 4, false, false, false, false, false, 4, null, 1, 57, 51, 11.0, 56, 5, 0.06, 0.11, 5, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (25, 'Etan', 'Thorpe', 75, 'red', 1, false, false, false, false, false, 2, null, 4, 234, 17, 9.0, 56, 11, 0.09, 0.11, 3, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (26, 'Neill', 'Swyndley', 78, 'blue', 3, false, false, false, false, false, 3, null, 3, 184, 56, 12.4, 73, 10, 0.13, 0.06, 5, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (27, 'Heida', 'MacAnelley', 22, 'red', 1, false, false, false, false, false, 2, null, 5, 113, 140, 8.1, 69, 14, 0.14, 0.06, 2, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (28, 'Marc', 'Veysey', 79, 'blue', 3, false, false, false, false, false, 4, null, 5, 102, 110, 7.5, 75, 12, 0.11, 0.1, 5, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (29, 'Seana', 'Bartalot', 71, 'red', 1, false, false, false, false, false, 4, null, 1, 365, 134, 2.4, 78, 11, 0.08, 0.07, 1, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (30, 'Xavier', 'Stealy', 13, 'blue', 3, false, false, false, false, false, 2, null, 1, 107, 130, 7.6, 52, 8, 0.1, 0.08, 3, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (31, 'Christophe', 'Kowalski', 84, 'green', 4, false, false, false, false, false, 3, null, 6, 85, 102, 7.1, 55, 7, 0.09, 0.14, 1, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (32, 'Gussie', 'Espino', 42, 'red', 1, false, false, false, false, false, 4, null, 3, 467, 124, 7.7, 63, 8, 0.08, 0.12, 5, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (33, 'Lowrance', 'Dillon', 77, 'yellow', 2, false, false, false, false, false, 3, null, 2, 483, 25, 6.6, 56, 3, 0.18, 0.07, 3, null);");
        DB::statement("insert into patients (id, name, surname, age, `group`, `group_value`, cardiac_arrest, irreversible_hypotension, motor_response, severe_burn, other_mortality_conditions, best_motor_response, best_verbal_response, best_eye_response, pao2_fio2, platelets, bilirubin, mabp, dopamine, epinephrine, norepinephrine, creatinine, at_least_one_organ_failure) values (34, 'Hoyt', 'Sabate', 52, 'blue', 3, false, false, false, false, false, 4, null, 4, 359, 33, 1.3, 79, 5, 0.09, 0.11, 3, null);");
        return redirect('/');
    }


}
