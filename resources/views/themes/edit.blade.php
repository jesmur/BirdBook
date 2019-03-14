@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Update Theme Information</h3></div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action='/admin/themes/{{ $theme->id}}'>

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-7    <script>
        var timeStamp = Date.now();

        function doPoll(){

            $.ajax({
                url:'http://localhost:8000/posts/poll?ts=' + timeStamp,
                success: function(result){
                    if(result != null) {
                        $("#posts").eq(0).prepend($.parseHTML(result));
                        timeStamp = "<?php echo $timestamp; ?>";
                    }
                    console.log(result);
                    setTimeout(doPoll, 1000);
                }
            })
        }
        setTimeout(doPoll, 1000);
    </script>">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $theme->name  }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cdn_url" class="col-md-3 control-label">CDN URL</label>
                        <div class="col-md-7">
                            <input id="cdn_url" type="text" class="form-control" name="cdn_url" value="{{ $theme->cdn_url }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-md-3 control-label">Description</label>
                        <div class="col-md-7">
                            <textarea id="description" class="form-control" name="description" rows="10" cols="10"
                                      maxlength="200" style="resize:none;" required >{{ $theme->description }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label  col-sm-offset-3" for="is_default">
                            <input type="checkbox" class="form-check-input" id="is_default" name="is_default" value="1"
                            @if($theme->is_default == 1)
                                checked disabled
                            @endif>
                            Default
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-5">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>

@endsection