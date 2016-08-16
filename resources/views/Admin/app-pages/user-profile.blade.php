@extends('Admin.index')

@section('main-content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-xs-12">
                    @if(Session::has('message'))

                        <div class="box">
                            <div class="alert alert-{{ Session::get('alert_type') }}">
                               {{ Session::get('message') }}
                            </div>

                        </div>

                        <div class="clearfix"></div>


                    @endif

                    <div class="box box-primary">

                        <div class="box-header">
                            <span class="box-title">My Profile</span>

                        </div>
                        <hr />
                        <div class="box-body">

                            <form action="/profile/{{ $user->id }}" method="post" class="form-horizontal">


                                <div class="form-group {{ $errors->has('user_name') ? 'has-error': '' }}">

                                    <label for="user_name" class="control-label col-sm-3">Name :</label>

                                    <div class="col-sm-6">

                                        {{ csrf_field() }}

                                        <input type="hidden" name="_method" value="PATCH" />

                                        <input type="text" class="form-control input-sm" name="user_name"  value="{{ $user->name }}" required="required">

                                        @if ($errors->has('user_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('user_name') }}</strong>
                                            </span>
                                        @endif


                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <div class="form-group">

                                    <label for="user_email" class="control-label col-sm-3">Email :</label>

                                    <div class="col-sm-6">

                                        <input class="form-control input-sm" disabled="disabled" name="user_email" placeholder="Email" type="email" required="required" value="{{ $user->email }}">
                                    </div>

                                </div>

                                <div class="clearfix"></div>


                                <div class="form-group">

                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" value="Update" class="btn btn-primary btn-sm">
                                    </div>

                                </div>

                            </form>


                        </div>

                        <div class="box-footer">
                            <span>Great, You are updating your profile Info !</span>
                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>




            </div>
        </section>
    </div>

@stop