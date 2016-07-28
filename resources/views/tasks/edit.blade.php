@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.errors')

        <div class="page-header">
            <h1>Task Viewer</h1>
        </div>
        {{--@can('owner',$task)--}}
            {!! Form::model($task,['route'=>['task.update',$task],'method'=>'PUT']) !!}
            @include('tasks.form')

            {!! Form::submit('Actualizar',['class'=>'btn btn-warning']) !!}

            {!! Form::close() !!}
        {{--@endcan--}}
    </div>
@endsection