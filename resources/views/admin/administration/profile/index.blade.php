@extends('layouts.admin.base')
@section('title', 'Profile')
@section('content')
<section style="padding: 30px 0;">
    <div class="container-fluid">
        <div class="row">
            <ul class="float-left">
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li style="float: left; margin: 0 10px;list-style: none">/</li>
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('user.profile') }}">Profile</a></li>
            </ul>
        </div>
        <hr>
        <form class="form-horizontal" method="POST" action="{{ route('user.updateprofile') }}" enctype="multipart/form-data">
            @csrf
        <section class="container" style="padding: 60px 20px;">
            <div class="">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center pb-3">
                                    <div class="image-preview2" id="imagePreview2">
                                        <img class="image-preview__image2 img-fluid img-circle profile-user-img" style="width: 200px;" src="{{ asset('assets/uploads/users') }}/{{ Auth::user()->photo }}" id="img_thumbnail" alt="">
                                        <span id="store_image2" class="image-preview__default-text2"></span>
                                    </div>
                                    <input class="input-file pt-5" name="photo" id="photo" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            @include('partials.alert')
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div>

                                    <div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name"  id="name" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->name }}" required placeholder="Name">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" name="email"  id="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" placeholder="E-mail Address">
                                                    @error('siteemail')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" value="{{ auth()->user()->phone }}" required>
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group button">
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Update Profile</button>
                                                    {{--  <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>  --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </form>
    </div>
</section>
@endsection

