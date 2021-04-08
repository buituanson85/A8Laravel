@extends('layouts.admin.base')
@section('title', 'Create Permissions')
@section('content')
    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('permissions.create') }}">Permission</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('permissions.create') }}">Create Permission</a></li>
                </ul>
            </div>
            <hr>
            <div class="row pt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create new Permission</h3>
                            <div class="card-tools">
                                <a href="{{ route('permissions.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Permission</a>
                            </div>
                        </div>
                        @include('partials.alert')
                        <form method="POST" action="{{ route('permissions.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Permission Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Permission URL</label>
                                    <input type="text" name="url"  id="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}" required placeholder="Permission URL">
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="icon">Permission Icon</label>
                                    <input type="text" name="icon"  id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon') }}" required placeholder="Permission Icon">
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create Permission</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection


