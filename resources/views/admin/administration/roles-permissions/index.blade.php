@extends('layouts.admin.base')
@section('title', 'Roles-Permissions')
@section('content')
    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('roles-permissions.index') }}">Roles</a></li>
                </ul>
            </div>
            <hr>
            <div class="row pt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Roles Table</h3>
                            <div class="card-tools">
{{--                                <a href="{{ route('addroles.create') }}" class="btn btn-primary"><i class="fas fa-shield-alt"></i> Add Role</a>--}}
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            @include('partials.alert')
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="5%">Role</th>
                                    <th width="55%" >Permission</th>
                                    <th width="20%">Date Posted</th>
                                    <th width="5%">Add Role</th>
                                    <th width="5%">Destroy</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse ($roles as $role )
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td style="line-height: 40px">
                                            @foreach ($role->permissions as $permission )
                                                <button class="btn btn-sm btn-warning" role="button"><i class="fas fa-shield-alt"></i> {{ $permission->name }}</button>&nbsp &nbsp
                                            @endforeach
                                        </td>
                                        <td><span class="tag tag-success">{{ $role->created_at }}</span></td>
                                        <td><a href="{{ route('roles-permissions.show', $role->id) }}"><span class="btn btn-sm btn-info"><i class="fa fa-edit"></i>&nbsp;Add Role</span></a></td>
                                        <td>
                                            {{--                                            @if($role->name === "Admin")--}}

                                            {{--                                            @else--}}
                                            <form action="{{ route('roles-permissions.destroy', $role->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                            </form>
                                            {{--                                            @endif--}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td><i class="fas fa-folder-open"></i> No Record found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection



