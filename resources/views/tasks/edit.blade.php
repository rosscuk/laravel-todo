@extends('layouts.master')

@section('content')
    <h1>Edit Task</h1>
    <hr/>

   {{--  {!! Form::model($task,['method' => 'PATCH','action' => ['TaskController@update', $task->id],
    'url' => '/task', 'class' => 'form-horizontal', 'role' => 'form']) !!} --}}

     {!! Form::model($task,['method' => 'PATCH','action' => ['TaskController@update', $task->id]]) !!}

        @include('tasks._form',['submitButtonText' => 'Edit Task'])

    {!! Form::close() !!}

@endsection