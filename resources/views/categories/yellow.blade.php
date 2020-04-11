@extends('layouts.app')

@section('content')
<div class='container'>

        <div class='row container_white shadow py-4 my-3' style="border-left: 30px solid #ffcc00;">
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1' >
                    <h3 class='my-4 font-weight-bold'>Yellow category patient <span class="badge badge-secondary badge-warning">SOFA score: {{ $sofa }}</span></h3>
                    <p>
                        Patient successfully added to the queue. Use ventilator as available after all Red category patients received ventilators. If there are no free ventilators, this yellow category patient is waiting in line for a ventilator therapy. Until then - use alternative form of live saving medical intervention and treatment.
                    </p>
                    <a href="{{ url('/patients/crud') }}" class='btn btn-primary my-0' >Back</a> 
                </div>
                
                
            </div>
        </div>
        

        

    </div>
@endsection
