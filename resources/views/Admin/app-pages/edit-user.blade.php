@extends('Admin.index')

@section('main-content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-primary">

                        <div class="box-header">
                            <span class="box-title">Edit User Profile</span>

                        </div>
                        <hr />
                        <div class="box-body">

                            <form action="/manage-user/{{ $user->id }}" method="post" class="form-horizontal">


                                <div class="form-group">

                                    <label for="user_name" class="control-label col-sm-3">Name :</label>

                                    <div class="col-sm-6">

                                        {{ csrf_field() }}

                                        <input type="hidden" name="_method" value="PATCH" />

                                        <input type="text" class="form-control input-sm" name="user_name" placeholder="user Name" value="{{ $user->name }}" required="required">


                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <div class="form-group">

                                    <label for="user_email" class="control-label col-sm-3">Email :</label>

                                    <div class="col-sm-6">

                                        <input class="form-control input-sm" name="user_email" placeholder="Email" type="email" required="required" value="{{ $user->email }}">
                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <div class="form-group">

                                    <label for="user_name" class="control-label col-sm-3">Role :</label>

                                    <div class="col-sm-6">
                                        <select name="user_role" id="roles" class="form-control input-sm">
                                            @forelse($roles as $role)
                                            <option value="{{$role->id}}"
                                               {{ count($user->roles) ? (($user->roles[0]->id == $role->id) ? 'selected' : '') : '' }}>

                                                {{$role->role}}

                                            </option>
                                             @empty
                                                <option value="1">No role to show</option>
                                            @endforelse
                                        </select>
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
                            <span>Great, You are updating a User's Info !</span>
                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>




            </div>
        </section>
    </div>

@stop