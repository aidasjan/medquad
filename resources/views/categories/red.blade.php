@extends('layouts.app')

@section('content')
<div class='container'>

        <div class='row container_white shadow py-4 my-3' style="border-left: 30px solid #bd0606;">
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1' >
                    <h3 class='my-4 font-weight-bold'>Red category patient <span class="badge badge-secondary badge-warning">SOFA score: {{ $sofa }}</span></h3>
                    <p>
                        Patient successfully added to the queue. Put this patient onto artificial lung ventilation. If there are no ventilators available, ventilator is taken from any patient from blue category. If there are no ventilated blue category patient, ventilator is taken from any ventilated patient from yellow category.
                    </p>
                    <a href="{{ url('/patients/crud') }}" class='btn btn-primary my-0' >Back</a> 
                </div>
                
                
            </div>
        </div>
        

        

    </div>
@endsection
