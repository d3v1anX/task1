@extends('adminlte::page')

@section('title', 'Student Create')

@section('content_header')
    <h1>Student Create</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif

@error('checked')
<div class="alert alert-danger">
    <strong>{{$message}}</strong>
</div>
@enderror

<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.students.store']) !!}
        @csrf
        
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-md-6">
                        {!! Form::label('name_student', 'Name: ') !!}
                        {!! Form::text('name_student', null,['class' => 'form-control','require' => 'required']); !!}
                        @error('name_student')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        {!! Form::label('lastname_student', 'Last name: ') !!}
                        {!! Form::text('lastname_student', null,['class' => 'form-control','require' => 'required']); !!}
                        @error('lastname_student')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        {!! Form::label('email', 'Email: ') !!}
                        {!! Form::email('email', null,['class' => 'form-control','require' => 'required']); !!}
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12" >
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Open hour</th>
                                    <th>Close hour</th>
                                    <th colspan="2">Selected</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{$schedule->date}}</td>
                                        <td>{{$schedule->start_schedule}}</td>
                                        <td>{{$schedule->end_schedule}}</td>
                                        <td><input type="checkbox" name="checked[]" value="{{$schedule->id}}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop