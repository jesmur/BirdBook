@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Create A New Theme</h3></div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action='/admin/themes/store'>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="name" value="{{  old('name') }}" required autofocus>
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="cdn_url" class="col-md-3 control-label">CDN URL</label>
                            <div class="col-md-7">
                                <input id="cdn_url" type="text" class="form-control" name="cdn_url" value="{{  old('cdn_url') }}" required>
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-md-3 control-label">Description</label>
                        <div class="col-md-7">
                            <textarea id="description" class="form-control" name="description" rows="10" cols="10"
                                      maxlength="200" style="resize:none;" required >{{  old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label  col-sm-offset-4" for="is_default">
                            <input type="checkbox" class="form-check-input" id="is_default" name="is_default" value="1">
                                  Default
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
                @include('layouts.errors')
            </div>
        </div>
    </div>

@endsection