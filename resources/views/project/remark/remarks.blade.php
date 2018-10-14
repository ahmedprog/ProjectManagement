<div class="panel-footer ">
    @foreach($project->remarks as $remark)
        <div class="box-comment">
            <div class="comment-text">
                            <span class="username">
                                <b>By:{{$remark->user->name}}</b>
                                <br>
                                @if($remark->user_id === Auth::user()->id )
                                    <div class="box-tools pull-right">
                                      <div class="btn-group">
                                      <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-2x fa-gear"></i></button>
                                      <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <button onclick="showFormEditComment('{{$remark->id}}');"
                                                    class="btn btn-block btn-warning btn-labeled  ">
                                              <i class="fa fa-pencil-square-o"></i>
                                                Edit Remark
                                            </button>
                                        </li>
                                        <li>
                                            <form method="post" action="{{url('/remark-project/'.$remark->id)}}">
                                                  {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-block btn-danger btn-labeled " type="submit">
                                                      <i class=" glyphicon glyphicon-trash"></i>
                                                    delete
                                                  </button>
                                            </form>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                @endif
                                <span class="margin text-muted pull-right">
                                    {{$remark->updated_at->diffForHumans()}}
                                </span>
                            </span><!-- /.username -->
                            <span>
                              <span id="commentText_{{$remark->id}}">{{$remark->body}}</span>
                              <p id="updateForm_{{$remark->id}}"></p>
                            </span>
            </div>
            <!-- /.comment-text -->
        </div>
        <hr>
    @endforeach
</div>

@push('js')
    <script>
        function showFormEditComment(commentID){
            $('#formUpdateComent').remove();
            const commentTextId=`#commentText_${commentID}`;
            const commetText=$(commentTextId).html();

            let el=`#updateForm_${commentID}`;
            el=$(el);
            const formEdit=`
    <form id="formUpdateComent">
      <div id="formUpdateComent" class="input-group ">
          <div class="input-group-btn">
            <button  type="submit" onclick="updateCommentAjax(${commentID})" class="btn btn-warning" >
              <i class="glyphicon glyphicon-edit"></i>
            </button>
            <a onclick="removeFormEdit()" class="btn btn-default">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
          </div>
          <input type="text" name="updateRemark" value="${commetText}" class="form-control">
      </div>
      <div class='text-red' id="commentError"></div>
    </form>`;
            $(formEdit).appendTo(el);
        }
        function removeFormEdit(){
            $('#formUpdateComent').remove();
        }
        function updateCommentAjax(commentID){
            $('#formUpdateComent').submit(function(e){
                e.preventDefault();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const targetUrl=`{{url('remark-project')}}/${commentID}`;
            const method='PUT';
            const _token="{{ csrf_token() }}";
            const updateRemark=$("input[name='updateRemark']").val();
            $.ajax({
                url:targetUrl,
                method:method,
                data:{token:_token,updateRemark:updateRemark},
                success:function(data){
                    if(data.success){
                        removeFormEdit();
                        const commentTextId=`#commentText_${commentID}`;
                        $(commentTextId).html(data.success);
                    }else{
                        $('#commentError').html(data.errors);
                    }
                }
            });
        }
    </script>

@endpush
