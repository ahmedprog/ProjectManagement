@extends('layouts.app')

@section('content')
<div class="container">

    {!! Form::model($project,['action'=>['ProjectController@update',$project->id] , 'method'=>'PUT']) !!}
    @include('project.inc._form')

    {{Form::submit('Update' , ['class'=>'btn  btn-warning btn-block'])}}
    {!! Form::close() !!}
</div>
@endsection