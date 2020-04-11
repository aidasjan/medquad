@extends('layouts.app')

@section('content')
<form action="{{action('PatientsController@storeInit')}}" method="POST">
    {{ csrf_field() }}
    <div class='container'>

        <p>
            The adult clinical ventilator allocation protocol applies to all patients aged 18 and older, who arrives at a hospital. All new arrived patients must undergo this protocol if there is shortage of ventilating systems in your hospital. The protocol consists of three steps: <br/>1. application of exclusion criteria  <br/>2. assessment of mortality risk <br/>3. periodic clinical assessments (“time trials”)<br><br>
            After filling Step 1 and Step 2 your patient will be asigned to BLUE, RED, YELLOW or GREEN Category and put into Medquad queue. After asigning a patient to the category, you will be instructed, wheater a patient gets a ventilator or alternative forms of medical interventions must be applied.
        </p>
        <hr/>

        <div class='row container_white shadow py-4 mt-4 mb-3'>
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1'>
                    <h3 class='my-4 font-weight-bold'>Patient personal information</h3>
                </div>
                <div class='form-group col-md-6 offset-md-1'>
                    <label>Name</label>
                    <input type='text' value="" name='name' class='form-control' required>
                </div>
                <div class='form-group col-md-6 offset-md-1'>
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
                    <h3 class='my-4 font-weight-bold'>Step 1. Exclusion criteria</h3>
                    <p>
                        A patient’s attending physician examines his/her patient for an exclusion criterion and will forward this clinical data to a triage officer/committee to make the triage decision. Patients with exclusion criteria do not have access to ventilator therapy and instead are provided with alternative forms of medical intervention and/or palliative care. If medical information is not readily available or accessible, it may be assumed a patient is free of exclusion criteria and may proceed to the next step of the clinical ventilator allocation protocol.
                    </p>
                </div>
                <div class='form-group col-md-10 offset-md-1 px-5'>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox" name='cardiac_arrest'>
                        <label>Cardiac Arrest</label>
                    </div>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox" name='irreversible_hypotension'>
                        <label>Irreversible age-specific hypotension unresponsive to fluid resuicitation and vasopressor therapy</label>
                    </div>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox" name='motor_response'>
                        <label>Traumatic brain injury with no motor response to painful stimulus</label>
                    </div>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox" name='severe_burn'>
                        <label>Severe burns: where predicted survival ≤ 10% even with unlimited aggressive therapy</label>
                    </div>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox" name='other_mortality_conditions'>
                        <label>Other conditions resulting in immediate or near-immediate mortality even with aggressive therapy</label>
                    </div>
                    <hr/>
                    <div>
                        <input class="form-check-input" type="checkbox">
                        <label>The patient has no exclusion criteria listed above</label>
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