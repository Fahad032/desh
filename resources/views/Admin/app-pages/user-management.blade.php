@extends('Admin.index')

@section('main-content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    @if(\Session::has('message'))
                    <div class="box">
                        <div class="alert alert-success">{{ \Session::get('message') }}</div>
                    </div>
                    <div class="clearfix"></div>
                    @endif


                    <div class="box box-success">
                        <div class="box-header"> <span class="box-title">Manage Users</span></div>


                        <div class="box-body">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>

                                <tbody>


                                    @forelse($users as $index=>$user)

                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <span class="label label-{{ count($user->roles) ? (($user->roles[0]->role == 'Admin')  ? 'success': 'warning'): 'default' }}">
                                                    {{ count($user->roles) ? $user->roles[0]->role : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td><a class="" href="/manage-user/{{$user->id}}/edit"><span class="fa fa-pencil"></span></a></td>
                                            <td>
                                                <form class="form-inline" method="post" action="/manage-user/{{ $user->id  }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="{{$user->id}}">

                                                    <button type="submit" class="btn-trash-default"> <span class="fa fa-trash"></span> </button>
                                                </form>
                                            </td>
                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="4" class="text-center">No roles Yet !</td>
                                        </tr>

                                    @endforelse

                                </tbody>


                            </table>

                            <div class="clearfix"></div>
                        </div>

                        <div class="box-footer">
                            <span>* User with admin roles has the full access to the application</span>
                        </div>

                        <div class="clearfix"></div>


                    </div>




                </div>

            </div>
        </section>
    </div>

@stop