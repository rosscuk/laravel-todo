@extends('layouts.master')

@section('content')
    <h1>Create New Task</h1>
    <hr/>

    {!! Form::open(['url' => '/task', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        @include('tasks._form',['submitButtonText' => 'Create Task'])
    {!! Form::close() !!}

@endsection