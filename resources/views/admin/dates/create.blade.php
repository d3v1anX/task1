@extends('adminlte::page')

@section('title', 'Dates Create')

@section('content_header')
    <h1>Dates Create</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.dates.store']) !!}
        @csrf
        
            <div class="form-group">
                {!! Form::label('date', 'Date: ') !!}
                <br>
                {!! Form::date('date', \Carbon\Carbon::now(),['class' => 'form-control']); !!}
            </div>
            <div class="form-group">
                    <div class="row" id="timeInputs">
                        <div class="col-12 col-md-6">
                            {!! Form::label('schedule_open', 'Open: ') !!}
                            {!! Form::time('times[]', null, ['class' => 'form-control','required' => 'required']) !!}
                            @error('times[]')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            {!! Form::label('schedule_close', 'Close: ') !!}
                            {!! Form::time('times[]', null, ['class' => 'form-control','required' => 'required']) !!}
                            @error('times[]')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {!! Form::button('Add more',['class' => 'btn btn-success mt-2','id' => 'addTime']) !!}
                    
            </div>

            {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        // Cuando el usuario haga clic en el botón "Agregar otro horario"
        $('#addTime').on('click', function() {
        
            // Crear un nuevo elemento de entrada de tiempo
        var newTimeInput = 
        `
        <div class="col-12 col-md-6">
            {!! Form::label('schedule_open', 'Open: ') !!}
            {!! Form::time('times[]', null, ['class' => 'form-control','required' => 'required']) !!}
        </div>
        <div class="col-12 col-md-6">
            {!! Form::label('schedule_close', 'Close: ') !!}
            {!! Form::time('times[]', null, ['class' => 'form-control','required' => 'required']) !!}
        </div>
        `

        // Agregar el nuevo elemento de entrada de tiempo al contenedor
        $('#timeInputs').append(newTimeInput);
        });
    </script>
@stop
