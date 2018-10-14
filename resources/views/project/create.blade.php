@extends('layouts.app')

@section('content')
<div class="container">

    {!! Form::open(['action'=>'ProjectController@store' , 'method'=>'POST']) !!}

    @include('project.inc._form')

    {{Form::submit('Save' , ['class'=>'btn  btn-success btn-block'])}}
    {!! Form::close() !!}
</div>
@endsection