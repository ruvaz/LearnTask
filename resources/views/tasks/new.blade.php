@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.errors')
        <div class="page-header">
            <h1>New Task</h1>
        </div>
        {!! Form::open(['route'=>'task.store','method'=>'POST']) !!}
        {!! Form::label('name','Nombre:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
        {!! Form::submit('Crear',['class'=>'btn btn-default']) !!}
        {!! Form::close() !!}
    </div>
@endsection