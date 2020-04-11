@extends('layouts.app')
@section('content')
<body>
    <div class='container'>
        <p>
            All acute care patients who are in need of a ventilator, whether due to Covid-19 or other conditions, are subject to the clinical ventilator allocation protocol. Using clinical criteria, patients who are deemed most likely to survive with ventilator treatment have an opportunity for ventilator therapy to maximize the number of survivors. The Guidelines’ definition of survival is based on the short-term likelihood of survival of the acute medical episode and is not focused on whether a patient may survive a given illness or disease in the long-term (e.g., years later). This is the queue of patients present in your emergency department.
        </p>

        <h4>Groups:</h4>
        <div class='font-weight-bold'>RED - Put this patient onto artificial lung ventilation</div>
        <div class='font-weight-bold'>YELLOW - Use ventilator as available after all Red category patients received ventilators</div>
        <div class='font-weight-bold'>BLUE - Critical patients, no ventilator is provided, use alternative medical intervention</div>
        <div class='font-weight-bold mb-4'>GREEN - Use alternative form of medical intervention or defer or discharge</div>

        <hr/>

        <h2 class='py-3'>Active Patients</h2>

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
                    @elseif ($patient->group == "red")
                        <td><i class="fas fa-square" style="color:#bd0606"></i></td>
                    @elseif ($patient->group == "green")
                        <td><i class="fas fa-square" style="color:#009933"></i></td>
                    @elseif ($patient->group == "yellow")
                        <td><i class="fas fa-square" style="color:#ffcc00"></i></td>
                    @else
                        <td><i class="fas fa-square" style="color:#aaaaaa"></i></td>
                    @endif
                    <td style="font-weight:bold; text-align:left">{{$patient->name}}</td>
                    <td style="font-weight:bold; text-align:left">{{$patient->surname}}</td>
                    <td style="font-weight:bold; text-align:left">{{$patient->age}}</td>
                    <td><a href='#'><i class="fas fa-edit" style="color:#bd0606" onclick="alert('Sorry, You are not allowed to perform this action')"></a></i></td>
                    <td><a href='{{url("/patients/$patient->id/destroy")}}'><i class="fas fa-trash-alt" style="color:#bd0606"></a></i></td>
                </tr>
                @endforeach
            <tbody>
        </table>
    </div>
</body>
@endsection