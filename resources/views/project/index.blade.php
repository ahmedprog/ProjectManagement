

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 pull-left">
            <div class="box box-default">
                @foreach ($projects as $project)

                    <div class="panel panel-default">
                        <div class="panel-heading"><a href='{{url("project/$project->id")}}'>{{$project->name}}</a></div>
                        <div class="panel-body">
                            <span class="label label-info text-muted inlineBlock">
                        <b> Start Date</b>
                                {{$project->startDate->format('d M Y')}}
                    </span>
                            <span class="label label-info text-muted inlineBlock">
                        <b> Start Date</b>
                                {{$project->startDate->format('d M Y')}}
                    </span>
                            <span class="label label-danger text-muted inlineBlock">
                        <b> For:</b>
                                {{$project->user->name}}
                    </span>

                        </div>
                    </div>

                    <hr>
                @endforeach
            </div>
        </div>

    </div>
@endsection