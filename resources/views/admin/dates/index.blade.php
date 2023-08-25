@extends('adminlte::page')

@section('title', 'Dates')

@section('content_header')
    <h1>Dates</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
    <div class="card-body">
        <a href="{{route('admin.dates.create')}}" class="btn btn-primary">New Date</a>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Open</th>
                    <th>Close</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dates as $date)
                    <tr>
                        <td>{{$date->id}}</td>
                        <td>{{$date->date}}</td>
                        <td>{{$date->start_schedule}}</td>
                        <td>{{$date->end_schedule}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop