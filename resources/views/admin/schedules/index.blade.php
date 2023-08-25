@extends('adminlte::page')

@section('title', 'Schedules')

@section('content_header')
    <h1>Schedules</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            @if(count($students) !== 0)
                <a href="{{route('admin.schedules.pdf')}}" target="_blank" class="btn btn-primary mb-2">Export PDF</a>
                <a href="{{route('emails.pdf')}}" class="btn btn-secondary mb-2" >Send email to students</a>
            @else
                <p class="text-bold text-sm">Note: To export PDF file or send any email please add dates and students first.</p>
            @endif
            
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-responsive">
                        <h2>Student</h2>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Last name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->name_student}}</td>
                                    <td>{{$student->lastname_student}}</td>
                                    <td>{{$student->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <footer>
                        {{$students->links()}}
                    </footer>
                </div>
                <div class="col-12">
                    <table class="table table-striped">
                        <h2>Schedule</h2>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Open hour</th>
                                <th>Close hour</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{$schedule->id}}</td>
                                    <td>{{$schedule->date}}</td>
                                    <td>{{$schedule->start_schedule}}</td>
                                    <td>{{$schedule->end_schedule}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <footer>
                        {{$schedules->links()}}
                    </footer>
                </div>
                
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop