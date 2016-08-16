@extends('Admin.index')

@section('main-content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                 <div class="col-xs-12">

                     <div class="box box-primary">

                         <div class="box-header">
                             <span class="box-title">Create A Role</span>

                         </div>
                         <hr />
                         <div class="box-body">

                             <form action="/roles" method="post" class="form-inline">

                                 <div class="form-group">

                                     {{ csrf_field() }}

                                     <input type="text" class="form-control input-sm" name="role_name" placeholder="Role Name">

                                     <input type="submit" value="Create" class="btn btn-primary btn-sm">
                                 </div>

                             </form>


                         </div>

                         <div class="box-footer">
                             <span>Newly created role will appear at the end of the list, you can't add an identical role twice !</span>
                         </div>

                     </div>

                 </div>

                <div class="clearfix"></div>


                <div class="col-xs-12">
                    <div class="box box-success">
                        <div class="box-header"> <span class="box-title">Existing Roles</span></div>


                        <div class="box-body">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Roles List</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>

                                <tbody>

                                @if($roles)
                                    @foreach($roles as $index=>$role)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $role->role }}</td>
                                            <td><a class="" href="/roles/{{$role->id}}/edit"><span class="fa fa-pencil"></span></a></td>
                                            <td>
                                                <form class="form-inline" method="post" action="/roles/{{ $role->id  }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="{{$role->id}}">

                                                    <button type="submit" class="btn-trash-default"> <span class="fa fa-trash"></span> </button>
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach
                                @else

                                <tr>
                                    <td colspan="4" class="text-center">No roles Yet !</td>
                                </tr>
                                @endif

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