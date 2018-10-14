

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">

            <div class="col-md-6 pull-left">
                {{$project->name}}
                <br>
                <span class="label label-info text-muted inlineBlock">
                    <b> Start Date</b>{{$project->startDate->format('d M Y')}}
                </span>
                <span class="label label-info text-muted inlineBlock">
                    <b> Start Date</b>{{$project->startDate->format('d M Y')}}
                </span>
                <span class="label label-danger text-muted inlineBlock">
                    <b> For:</b>{{$project->user->name}}
                </span>
            </div>
            @if(auth()->user()->isAdmin())
            <div class="col-md-6 ">
                <a href="{{url('project/'.$project->id.'/edit')}}" class="btn btn-warning">Edit</a>
                <form style="display:inline"; action="{{url('project/'.$project->id) }} " method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
            @endif
            <div class="clearfix"></div>

        </div>
       <div class="panel-body">
            {{$project->description ?? "No description"}}
        </div>
        <div class="panel-footer">
            @include('project.remark.create')
        </div>
        @include('project.remark.remarks')

    </div>
</div>
@endsection

