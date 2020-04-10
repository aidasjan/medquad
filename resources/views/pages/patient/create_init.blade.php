@extends('layouts.app')

@section('content')
<form action="{{action('PatientsController@storeInit')}}" method="POST">
    {{ csrf_field() }}
    <div class='container'>

        <div class='row container_white shadow py-4 my-3'>
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1'>
                    <h3 class='my-4 font-weight-bold'>1. Patient personal information</h3>
                </div>
                <div class='form-group col-md-10 offset-md-1'>
                    <label>Name</label>
                    <input type='text' value="" name='name' class='form-control' required>
                </div>
                <div class='form-group col-md-10 offset-md-1'>
                    <label>Surname</label>
                    <input type='text' value="" name='surname' class='form-control' required>
                </div>
                <div class='form-group col-md-3 offset-md-1'>
                    <label>Age</label>
                    <input type='number' value="" name='age' class='form-control' required>
                </div>
            </div>
        </div>
        
        <div class='row container_white shadow py-4 my-3'>
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1'>
                    <h3 class='my-4 font-weight-bold'>2. Question</h3>
                </div>
                <div class='form-group col-md-10 offset-md-1'>
                    <label>Field</label>
                    <input type='text' value="" name='field' class='form-control'>
                </div>
            </div>
        </div>

        <div class='row container_white shadow py-4 my-3'>
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1 my-0'>
                    <input type='submit' class='btn btn-primary my-0' value='Continue'>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection