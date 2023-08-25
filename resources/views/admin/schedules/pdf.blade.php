<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        .table-h2{
            background-color: black;
            color: white;
            text-align: center;
            width: 100%;
        }
        .table-h3{
            background-color: black;
            color: white;
            text-align: center;
            width: 100%;
        }
        .cabecera{
            background-color: gray;
            color: black;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2 class="table-h2">Schedule</h2>

    @php
        $previousDate = null;
        $previousStartSchedule = null;
        $previousEndSchedule = null;
    @endphp

    @foreach ($students as $student)

    @if ($previousDate !== $student->date)

    @php
        $previousDate = $student->date;
    @endphp

        <h3 class="table-h3">{{$student->date}}</h3>
    @endif
  
    <table class="table" style="text-align: center;width:100%;">
        <thead class="cabecera">
            <tr>
                <th>Open hour</th>
                <th>Close hour</th>
                <th>Student</th>
            </tr>
        </thead>
        <tbody>
           
                <tr>
                    <td>{{$student->start_schedule}}</td>
                    <td>{{$student->end_schedule}}</td>
                    <td style="background-color: gray;color:black;font-weight: bold;font-size:22px;">{{$student->email}}</td>
                </tr>
        </tbody>
    </table>
        
    @endforeach
</body>
</html>