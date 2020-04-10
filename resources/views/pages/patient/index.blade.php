@extends('layouts.app')
@section('content')
<body>
    <div class='container'>
        <table class="table table_main table-striped text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($patients as $patient)
                <tr>
                    <td>{{$patient->name}}</td>
                    <td>{{$patient->surname}}</td>
                    <td>{{$patient->age}}</td>
                </tr>
                @endforeach
            <tbody>
        </table>
    </div>
</body>
@endsection