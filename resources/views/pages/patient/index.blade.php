@extends('layouts.app')
@section('content')
<body>
    <div class='container'>
        <table class="table table_main table-striped text-center">
            <thead>
                <tr>
                    <th>Group</th>
                    <th style="font-weight:bold; text-align:left">Name</th>
                    <th style="font-weight:bold; text-align:left">Surname</th>
                    <th style="font-weight:bold; text-align:left">Age</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($patients as $patient)
                <tr>
                    @if ($patient->group == "blue")
                        <td><i class="fas fa-square" style="color:#0066cc"></i></td>
                    @endif
                    @if ($patient->group == "red")
                        <td><i class="fas fa-square" style="color:#bd0606"></i></td>
                    @endif
                    @if ($patient->group == "green")
                        <td><i class="fas fa-square" style="color:#009933"></i></td>
                    @endif
                    @if ($patient->group == "yellow")
                        <td><i class="fas fa-square" style="color:#ffcc00"></i></td>
                    @endif
                    <td style="font-weight:bold; text-align:left">{{$patient->name}}</td>
                    <td style="font-weight:bold; text-align:left">{{$patient->surname}}</td>
                    <td style="font-weight:bold; text-align:left">{{$patient->age}}</td>
                    <td><a href='#'><i class="fas fa-edit" style="color:#bd0606"></a></i></td>
                    <td><a href='#'><i class="fas fa-trash-alt" style="color:#bd0606"></a></i></td>
                </tr>
                @endforeach
            <tbody>
        </table>
    </div>
</body>
@endsection