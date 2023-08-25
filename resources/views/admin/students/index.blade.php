@extends('adminlte::page')

@section('title', 'Students')

@section('content_header')
    <h1>Students</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
    <div class="card-body">
        @if (count($dates) !== 0)
            <a href="{{route('admin.students.create')}}" class="btn btn-primary">New Student</a>
        @else
            <p class="text-bold text-sm">Note: To add students you need add dates first</p>
        @endif
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
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
    </div>
    <div class="card-footer">
        {{$students->links()}}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
