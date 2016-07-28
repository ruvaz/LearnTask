@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.success')

        <div class="page-header">
            <h1>Tasks</h1>
        </div>


        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Tasks</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)

                {{--policy--}}
                @can('owner',$task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->name}}</td>
                        <td>
                            <div class="btn-group-vertical">
                                {!! link_to_route('task.edit',$title="Edit",$parameter = $task,['class'=>'btn btn-success']) !!}
                                @include('tasks.delete')
                            </div>
                        </td>
                    </tr>
                @endcan


            @endforeach
            </tbody>
        </table>

        <a href="{!! route('task.create') !!}" class="btn btn-default">New</a>
    </div>
@endsection