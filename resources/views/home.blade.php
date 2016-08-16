@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   <span class="fa fa-warning"></span> You are logged in! Your account needs to be approved by the admin, Please request the admin to grant access permission.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
