<div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
    {{Form::label('name', 'Name',['class'=>'control-label'])}}
    <span class="text-red"><b>*</b></span>
    {{Form::text('name', old('name'), ['class'=>'form-control','required'])}}
    @if ($errors->has('name'))
        <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
</div>
<div class="form-group col-md-6{{ $errors->has('user_id') ? ' has-error' : '' }}">
    {{Form::label('user_id','User',['class'=>'control-label'])}}
    <span class="text-red"><b>*</b></span>
    <select  name="user_id" class="form-control" id="user_id">
        @foreach($users as $user)
            <option value={{$user->id}}

            @if(isset($project->user_id))
                {{$project->user_id ===  $user->id ?'selected':''}}
                    @endif>
                {{$user->name}}
            </option>
        @endforeach
    </select>
    @if ($errors->has('user_id'))
        <span class="help-block">
        <strong>{{ $errors->first('user_id') }}</strong>
    </span>
    @endif
</div>



<div class="form-group col-sm-12 {{ $errors->has('description') ? ' has-error' : '' }}">
     {{Form::label('description','Description' ,['class'=>'control-label'])}}
     {{Form::textarea('description', old('description'), [ 'rows'=>4,'class'=>'form-control'])}}
     @if ($errors->has('description'))
         <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
    </span>
     @endif
 </div>

<div class="form-group col-md-6 {{ $errors->has('startDate') ? ' has-error' : '' }}">
    {{Form::label('startDate','Start Date',['class'=>'control-label'])}}
    <span class="text-red"><b>*</b></span>
    {{Form::date('startDate',
    isset($project->startDate)?old('startDate',$project->startDate):  \Carbon\Carbon::now(),
    [ 'class'=>'form-control','required'])}}
    @if ($errors->has('startDate'))
        <span class="help-block">
        <strong>{{ $errors->first('startDate') }}</strong>
    </span>
    @endif
</div>

<div class="form-group col-md-6{{ $errors->has('endDate') ? ' has-error' : '' }}">
    {{Form::label('endDate','End Date',['class'=>'control-label'])}}
    <span class="text-red"><b>*</b></span>
    {{Form::date('endDate',
     isset($academicYear->EndDate)?old('endDate',$project->endDate): \Carbon\Carbon::now()
    ,[ 'class'=>'form-control','required'])}}
    @if ($errors->has('endDate'))
        <span class="help-block">
        <strong>{{ $errors->first('endDate') }}</strong>
    </span>
    @endif
</div>


