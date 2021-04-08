@extends('layouts.admin.base')
@section('title', 'User')
@section('content')
    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('users.index') }}">Table User</a></li>
                </ul>
            </div>
            <hr>
            <div id="app" class="row pt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="p-0">
                        <div class="card">
                            <div class="card-header ui-sortable-handle" style="cursor: move">
                                <h3 class="card-title">
                                    <i class="fas fa-users mr-1"></i>
                                    Table User
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">

                                        <li class="nav-item mr-1">
{{--                                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary" ><i class="fas fas-plus-circle"></i>Add New</a>--}}
                                        </li>

                                        <li class="nav-item">
                                            <form action="{{ route('users.index') }}" class="form-group">
                                            <div class="input-group mt-0 input-group-sm" style="width: 350px;">
                                                    <input type="text" name="name" class="form-control float-right" placeholder="Search by name, email">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div>
                                            </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                @include('partials.alert')
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>utype</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Date Posted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->utype }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                <button class="btn btn-sm btn-secondary" role="button">{{ $role->name }}</button>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('users.show', $user->id ) }}"><span class="btn btn-sm btn-info"><i class="fa fa-eye"></i>&nbsp;View</span></a>
                                            </td>
                                            <td>
                                                @if(count($user->roles)>0)
                                                    @foreach($user->roles as $role)
                                                        @if($role->name == "Admin")
                                                            @break
                                                        @else
                                                            <a href="{{ route('users.edit', $user->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit Role</span></a>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @if($user->utype == 'ADM')
                                                    <a href="{{ route('users.edit', $user->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Create Role</span></a>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if(count($user->roles)>0)
                                                @foreach($user->roles as $role)
                                                    @if($role->name == "Admin")
                                                        @break
                                                    @else
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                    </form>
                                                        @break
                                                    @endif
                                                @endforeach
                                                @else
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $users -> links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <script src="{{ asset('js/app.js') }}"></script>
        </div>
    </section>
@endsection



