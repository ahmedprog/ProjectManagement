<div class="panel-footer">

    <form class="form-horizontal"  method="POST" action="{{url('remark-project/')}}">
        {{ csrf_field() }}
        <div class="input-group {{ $errors->has('body') ? ' has-error' : '' }}">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <i class="glyphicon glyphicon-share"></i>
                </button>
            </div>
            <input type="hidden"  name="project_id" value="{{$project->id}}" >
            <input type="text" class="form-control" name="body" value="{{old('body')}}" placeholder="Add Remark">
            @if ($errors->has('body'))
                <span class="help-block" style="margin-top: -20px;">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>
    </form>
</div><!-- /.box-footer -->
