{!! Form::open(['route'=>['task.destroy',$task],'method'=>'DELETE']) !!}
{!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
{!! Form::close() !!}