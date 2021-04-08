/@extends('layouts.admin.base')
@section('title', 'Change Password')
@section('content')
    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('user.profile') }}">Password</a></li>
                </ul>
            </div>
            <hr>
            <section class="content pt-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            @include('partials.alert')
                            <div class="card-body">
                                <div>
                                    <div>
                                        <form class="form-horizontal" method="POST" action="{{ route('user.editpassword') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="newpassword">Enter New Password</label>
                                                        <input type="password" name="newpassword"  id="newpassword" class="form-control @error('newpassword') is-invalid @enderror" value="" required placeholder="New Password">
                                                        @error('newpassword')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="newpassword_confirmation">Confirm New Password</label>
                                                        <input type="password" name="newpassword_confirmation"  id="newpassword_confirmation" class="form-control @error('newpassword_confirmation') is-invalid @enderror" value="" required placeholder="Confirm Password">
                                                        @error('newpassword_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group button">
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-lock"></i> Change Password</button>
                                                        {{--  <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>  --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
