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
  
                <div class='row py-3'>
                    <div class='col'>
                        <div class='form-group col-md-10 offset-md-1'>
                            <label>Best motor response</label>
                            <input type='number' value="" name='best_motor_response' class='form-control' required>
                        </div>
                    </div>
                    <div class='col'>
                        <table class='table'>
                            <tr><td>No eye opening</td><td>1</td></tr>
                            <tr><td>No eye opening</td><td>1</td></tr>
                            <tr><td>No eye opening</td><td>1</td></tr>
                        </table>
                    </div>
                </div>
                <div class='row py-3'>
                    <div class='col'>
                        <div class='form-group col-md-10 offset-md-1'>
                            <label>Best motor response</label>
                            <input type='number' value="" name='best_motor_response' class='form-control' required>
                        </div>
                    </div>
                    <div class='col'>
                        <table class='table'>
                            <tr><td>No eye opening</td><td>1</td></tr>
                            <tr><td>No eye opening</td><td>1</td></tr>
                            <tr><td>No eye opening</td><td>1</td></tr>
                        </table>
                    </div>
                </div>
                <div class='row py-3'>
                    <div class='col'>
                        <div class='form-group col-md-10 offset-md-1'>
                            <label>Best motor response</label>
                            <input type='number' value="" name='best_motor_response' class='form-control' required>
                        </div>
                    </div>
                    <div class='col'>
                        <table class='table'>
                            <tr><td>No eye opening</td><td>1</td></tr>
                            <tr><td>No eye opening</td><td>1</td></tr>
                            <tr><td>No eye opening</td><td>1</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class='row container_white shadow py-4 my-3'>
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1'>
                    <h3 class='my-4 font-weight-bold'>2. SOFA Scale</h3>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Best eye response</label>
                    <input type='number' value="" step='0.01' name='pao2_fio2' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Platelets</label>
                    <input type='number' value="" step='0.01' name='platelets' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Bilirubin</label>
                    <input type='number' value="" step='0.01' name='bilirubin' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Mabp</label>
                    <input type='number' value="" step='0.01' name='mabp' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Dopamine</label>
                    <input type='number' value="" step='0.01' name='dopamine' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Epinephrine</label>
                    <input type='number' value="" step='0.01' name='epinephrine' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Norepinephrine</label>
                    <input type='number' value="" step='0.01' name='norepinephrine' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Creatinine</label>
                    <input type='number' value="" step='0.01' name='creatinine' class='form-control' required>
                </div>
                <div class='form-group col-md-10 offset-md-1 px-5'>
                    <div>
                        <input class="form-check-input" type="checkbox" name='at_least_one_organ_failure'>
                        <label>At least one organ failure</label>
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
@endsection