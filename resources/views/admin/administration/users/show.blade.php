@extends('layouts.admin.base')
@section('title', 'User')
@section('content')
<section style="padding: 30px 0;">
    <div class="container-fluid">
        <div class="row">
            <ul class="float-left">
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li style="float: left; margin: 0 10px;list-style: none">/</li>
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('users.index') }}">Users</a></li>
                <li style="float: left; margin: 0 10px;list-style: none">/</li>
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('users.index') }}">Profile User</a></li>
            </ul>
        </div>
        <hr>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Profile User
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-uppercase">User {{ $users->name }}</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">Photo</th>
                                    <td><img src="{{ asset('assets/uploads/products')}}/{{ $users->photo }}" width="100" alt=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ $users->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>{{ $users->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Role</th>
                                    <td>
                                        @foreach($users->roles as $role)
                                        {{ $role->name }}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Permission</th>
                                    <td>
                                        @foreach($users->roles as $role)
                                        @foreach ($role->permissions as $permission )
                                            {{ $permission->name }} ,
                                        @endforeach
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Created At</th>
                                    <td>{{ $users->created_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Updated At</th>
                                    <td>{{ $users->updated_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
