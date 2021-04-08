@extends('layouts.admin.base')
@section('title', 'Dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>
            </div>

            <div class="col-md-12 mt-lg-4 mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Roles</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Roles</th>
                                        <th>Permissions</th>
                                        <th>User</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->name}}</td>
                                            <td>
                                                @if(count($role->permissions)>0)
                                                    @foreach($role->permissions as $permission)
                                                        <span class="badge badge-success">{{$permission->name}}</span>
                                                    @endforeach
                                                @else
                                                    <span class="badge badge-danger">No permission</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul>
                                                    @if(count($role->users)>0)
                                                        @foreach($role->users as $user)
                                                            <li class="badge badge-success">{{$user->name}}</li>
                                                        @endforeach
                                                    @else
                                                        <li class="badge badge-danger">No user</li>
                                                    @endif
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Users</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)

                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>

                                                @if(count($user->roles)>0)
                                                    @foreach($user->roles as $role)
                                                        <span class="badge  badge-success">{{$role->name}}</span>
                                                    @endforeach
                                                @else
                                                    <span class="badge badge-danger">No role</span>
                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->
@endsection



