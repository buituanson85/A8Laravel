@extends('layouts.admin.base')
@section('title', 'Edit Role')
@section('content')
    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('roles.index') }}">Roles</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('roles.create') }}">Edit Roles</a></li>
                </ul>
            </div>
            <hr>
            <div class="row pt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create new Roles</h3>
                            <div class="card-tools">
                                <a href="{{ route('roles.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Roles</a>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Roles Name</label>
                                    <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}" required placeholder="Roles Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    @foreach ($permissions as $permission)--}}

{{--                                        <div class="checkbox">--}}
{{--                                            <label>--}}
{{--                                                {{ ucfirst($permission->name) }}--}}
{{--                                            </label>--}}
{{--                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" @if($role->permissions->contains($permission)) checked @endif>--}}

{{--                                            <br>--}}
{{--                                        </div>--}}

{{--                                    @endforeach--}}
{{--                                </div>--}}
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection




