@extends('layouts.app')

@section('content')
<div class='container'>

        <div class='row container_white shadow py-4 my-3' style="border-left: 30px solid #009933;">
            <div class='col'>
                <div class='form-group col-md-10 offset-md-1' >
                    <h3 class='my-4 font-weight-bold'>Green category patient <span class="badge badge-secondary badge-warning">SOFA score: {{ $sofa }}</span></h3>
                    <p>
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                    </p>
                    <a href="{{ url('/patients/crud') }}" class='btn btn-primary my-0' >Back</a> 
                </div>
                
                
            </div>
        </div>
        

        

    </div>
@endsection
