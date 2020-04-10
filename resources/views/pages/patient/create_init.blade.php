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
                    <h3 class='my-4 font-weight-bold'>2. Current conditions</h3>
                </div>
                <div class='form-group col-md-10 offset-md-1 px-5'>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox" name='cardiac_arrest'>
                        <label>Cardiac Arrest</label>
                    </div>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox" name='cardiac_arrest'>
                        <label>Irreversible age-specific hypotension unresponsive to fluid resuicitation and vasopressor therapy</label>
                    </div>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox" name='cardiac_arrest'>
                        <label>Other conditions resulting in immediate or near-immediate mortality even with aggressive therapy</label>
                    </div>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox" name='cardiac_arrest'>
                        <label>Traumatic brain injury with no motor response to painful stimulus</label>
                    </div>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox" name='cardiac_arrest'>
                        <label>Traumatic brain injury with no motor response to painful stimulus</label>
                    </div>
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