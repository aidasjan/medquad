@extends('layouts.app')

@section('content')
<form action="{{action('PatientsController@storeMain', $patient->id)}}" method="POST">
    {{ csrf_field() }}
    <div class='container'>

        <div class='row container_white shadow py-4 my-3'>
            <div class='col'>

                <div class='form-group col-md-10 offset-md-1'>
                    <h3 class='my-4 font-weight-bold'>1. Glasgow comma scale</h3>
                </div>
  
                <div class='form-group col-md-6 offset-md-1'>
                    <label>Best motor response</label>
                    <select class='form-control' name='best_eye_response'>
                        <option value='1'>No eye opening</option>
                        <option value='2'>Eye opens to painful stimulus</option>
                        <option value='3'>Eye opens to verbal command</option>
                        <option value='4'>Eyes open spontaneously</option>
                    </select>
                </div>
                <div class='form-group col-md-6 offset-md-1'>
                    <label>Best verbal response</label>
                    <select class='form-control' name='best_verbal_response'>
                        <option value='1'>No verbal response</option>
                        <option value='2'>Incomprehensible sounds</option>
                        <option value='3'>Inappropriate words</option>
                        <option value='4'>Confused</option>
                        <option value='5'>Oriented</option>
                    </select>
                </div>
                <div class='form-group col-md-6 offset-md-1'>
                    <label>Best motor response</label>
                    <select class='form-control' name='best_motor_response'>
                        <option value='1'>No motor response</option>
                        <option value='2'>Extension to painful stimulus</option>
                        <option value='3'>Flexion to painful stimulus</option>
                        <option value='4'>Withdraws from painful stimulus</option>
                        <option value='5'>Localizes to painful stimulus</option>
                        <option value='6'>Obeys commands</option>
                    </select>
                </div>

            </div>
        </div>

        <div class='row container_white shadow py-4 my-3'>
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1'>
                    <h3 class='my-4 font-weight-bold'>2. SOFA Scale</h3>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>PaO<sub>2</sub>, mmHg</label>
                    <input type='number' value="" step='0.01' name='pao2_fio2' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Platelets, x10<sup>3</sup></label>
                    <input type='number' value="" step='0.01' name='platelets' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Bilirubin, mg/dL</label>
                    <input type='number' value="" step='0.01' name='bilirubin' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>MABP, mmHg</label>
                    <input type='number' value="" step='0.01' name='mabp' id='mabp' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Dopamine</label>
                    <input type='number' value="" step='0.01' name='dopamine' id='dopamine' class='form-control' disabled>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Epinephrine</label>
                    <input type='number' value="" step='0.01' name='epinephrine' id='epinephrine' class='form-control' disabled>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Norepinephrine</label>
                    <input type='number' value="" step='0.01' name='norepinephrine' id='norepinephrine' class='form-control' disabled>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Creatinine, mg/dL</label>
                    <input type='number' value="" step='0.01' name='creatinine' class='form-control' required>
                </div>
                <div class='form-group col-md-10 offset-md-1 px-5'>
                    <div>
                        <input class="form-check-input" type="checkbox" name='at_least_one_organ_failure'>
                        <label>Patient has at least one organ failure</label>
                    </div>
                </div>
            </div>
        </div>

        <div class='row container_white shadow py-4 my-3'>
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1 my-0'>
                    <input type='submit' class='btn btn-primary my-0' value='Submit'>
                </div>
            </div>
        </div>

    </div>
</form>

<script>

document.getElementById('mabp').oninput = function () {
    let dopamine = document.getElementById('dopamine');
    let mabpval = document.getElementById('mabp').value;
    if(mabpval >= 70) {
        dopamine.disabled = false;
    } else dopamine.disabled = true;
}

document.getElementById('dopamine').oninput = function () {
    let epinephrine = document.getElementById('epinephrine');
    let norepinephrines = document.getElementById('norepinephrine');
    let dopamineval = document.getElementById('dopamine').value;
    if(dopamineval >= 5) {
        epinephrine.disabled = false;
        norepinephrines.disabled = false;
    } else {
        epinephrine.disabled = true;
        norepinephrines.disabled = true;
    }
}

</script>

@endsection