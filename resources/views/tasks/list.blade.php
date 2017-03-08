@extends('layouts.master')

@section('content')
    <h1>Todo List <a href="{{ url('/task/create') }}" class="btn btn-primary pull-right btn-sm">Create New Task</a></h1>
    <hr/>

    @include('partials.flash_notification')

    @if(count($taskList))
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th colspan="2">Task Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($taskList as $task)
                    <tr>
                        <td><a href="{{ route('task.edit', $task->id) }}"><span class="glyphicon glyphicon-pencil" style="font-size:1.5em;" aria-hidden="true"></span></a></td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->complete? 'Completed' : 'Pending' }}</td>
                        <td>
                            {!! Form::open(['route' => ['task.update', $task->id], 'class' => 'form-inline', 'method' => 'put']) !!}
                                @if($task->complete)
                                    {!! Form::submit('Incomplete', ['class' => 'btn btn-info btn-xs']) !!}
                                @else
                                    {!! Form::submit('Complete', ['class' => 'btn btn-success btn-xs']) !!}
                                @endif
                            {!! Form::close() !!}

                            {!! Form::open(['route' => ['task.destroy', $task->id], 'class' => 'form-inline', 'method' => 'delete']) !!}
                                {!! Form::hidden('id', $task->id) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {!! $taskList->render() !!}
        </div>
    @else
        <div class="text-center">
            <h3>No tasks available yet</h3>
            <p><a href="{{ url('/task/create') }}">Create new task</a></p>
        </div>
    @endif
@endsection