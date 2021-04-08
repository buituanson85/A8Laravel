@extends('layouts.admin.base')
@section('title', 'Permissions')
@section('content')
    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('permissions.index') }}">Permissions</a></li>
                </ul>
            </div>
            <hr>
            <div class="row pt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Permission Table</h3>

                            <div class="card-tools">
                                <a href="{{ route('permissions.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create new permission</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @include('partials.alert')
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Date Posted</th>
                                    <th>Edit</th>
                                    <th>Destroy</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->url }}</td>
                                        <td>{{ $permission->created_at }}</td>
                                        <td>
                                            <a href="{{ route('permissions.edit', $permission->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</span></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>No Result Found</tr>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $permissions -> links('pagination::bootstrap-4') }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

