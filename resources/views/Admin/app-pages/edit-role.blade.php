@extends('Admin.index')

@section('main-content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-primary">

                        <div class="box-header">
                            <span class="box-title">Edit Role</span>

                        </div>
                        <hr />
                        <div class="box-body">

                            <form action="/roles/{{ $role->id }}" method="post" class="form-inline">

                                <div class="form-group">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="PATCH" />

                                    <input type="text" class="form-control input-sm" name="role_name" placeholder="Role Name" value="{{ $role->role }}">

                                    <input type="submit" value="Create" class="btn btn-primary btn-sm">
                                </div>

                            </form>


                        </div>

                        <div class="box-footer">
                            <span>Great, You are updating a role !</span>
                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>




            </div>
        </section>
    </div>

@stop