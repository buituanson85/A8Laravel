@extends('layouts.admin.base')
@section('title', 'Create User')
@section('content')
    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('users.index') }}">Users</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('users.create') }}">Create Users</a></li>
                </ul>
            </div>
            <hr>
            <div class="row pt-5">
                <div class="col-md-10 offset-md-1">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create new Roles</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Roles</a>
                            </div>
                        </div>
                        <form class="form-group pt-3" method="POST" action="{{route('register')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="frm-reg-lname">Name*</label>

                                    <div class="col-md-6">
                                        <input type="text" id="frm-reg-lname" name="name" placeholder="Your name*" :value="name" required autofocus autocomplete="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="frm-reg-email">Email Address*</label>

                                    <div class="col-md-6">
                                        <input type="email" id="frm-reg-email" name="email" placeholder="Email address" :value="email" >

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="frm-reg-pass">Password *</label>

                                    <div class="col-md-6">
                                        <input type="password" id="frm-reg-pass" name="password" placeholder="Password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="frm-reg-cfpass">Confirm Password *</label>

                                    <div class="col-md-6">
                                        <input type="password" id="frm-reg-cfpass" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <input type="submit" class="btn btn-sign" value="Register" name="register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection




