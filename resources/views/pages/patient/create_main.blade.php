@extends('layouts.app')

@section('content')
<form action="#" method="POST">
    <div class='container'>

        <div class='row container_white shadow py-4 my-3'>
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1'>
                    <h3 class='my-4 font-weight-bold'>1. Glasgow comma scale</h3>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Best motor response</label>
                    <input type='number' value="" name='best_motor_response' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Best motor response</label>
                    <input type='number' value="" name='best_verbal_response' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Best motor response</label>
                    <input type='number' value="" name='best_eye_response' class='form-control' required>
                </div>
            </div>
        </div>
        
        <div class='row container_white shadow py-4 my-3'>
            <div class='col'>

            </div>
        </div>

    </div>
</form>
@endsection