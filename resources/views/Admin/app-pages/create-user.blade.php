@extends('Admin.index')

@section('main-content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-primary">

                        <div class="box-header">
                            <span class="box-title">Create User Account</span>

                        </div>
                        <hr />
                        <div class="box-body">

                            <form class="form-horizontal" role="form" method="POST" action="/manage-user">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-3 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control input-sm" name="name" value="{{ old('name') }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control input-sm" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-3 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control input-sm" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-3 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control input-sm" name="password_confirmation">

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-btn fa-user"></i> Register
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>

                        <div class="box-footer">
                            <span>Great, You are creating a new User account !</span>
                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>




            </div>
        </section>
    </div>

@stop