@extends('layouts.master')

@section('content')
	<div class="row">
    <h2>{{$task->name}} <a href="{{ route('task.edit', $task->id) }}" class="btn btn-primary pull-right btn-sm">Edit Task</a></h2>
    <hr/>

    @include('partials.flash_notification')

    <h4>Task Description:</h4>
    <p>{{$task->description}}</p>
    </div>
    <div class="row">
    <h2>Subtasks <a href="/task/{{$task->id}}/subtask/create" class="btn btn-primary pull-right btn-sm">Create Subtask</a></h2>
    </div>

    <div class="row">
    @include('subtasks._list')
    </div>
    
@endsection