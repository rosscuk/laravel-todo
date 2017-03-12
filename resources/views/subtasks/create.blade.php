@extends('layouts.master')

@section('content')
    <h2>Create New Subtask for {{$task->name}}</h2>
    <hr/>

    {!! Form::open(['url' => '/task/'.$task->id.'/subtask', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        @include('subtasks._form',['submitButtonText' => 'Create Task'])
    {!! Form::close() !!}

@endsection