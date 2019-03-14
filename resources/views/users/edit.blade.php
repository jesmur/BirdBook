@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Update User Information</div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action='/admin/users/{{ $user->id}}'>

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name  }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email}}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label col-sm-offset-4" for="user_administrator">
                                <input type="checkbox" class="form-check-input" name="user_administrator" value="1"
                               @if($user->id == 1)disabled
                                @endif
                               @if($user->hasRole(1))
                                   checked
                                @endif>User Administrator
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label col-sm-offset-4" for="post_moderator">
                                <input type="checkbox" class="form-check-input" name="post_moderator" value="2"
                                   @if($user->id == 1)disabled
                                   @endif
                                   @if($user->hasRole(2))
                                       checked
                                    @endif> Post Moderator
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label  col-sm-offset-4" for="theme_manager">
                                <input type="checkbox" class="form-check-input" name="theme_manager" value="3"
                                   @if($user->id == 1)disabled
                                   @endif
                                   @if($user->hasRole(3))
                                       checked
                                    @endif>Theme Manager
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>

@endsection