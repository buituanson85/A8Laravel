@extends('layouts.pages.base')
@section('title', 'Categories Home')
@section('content')
<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Organic Fruits</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="/" class="permal-link">Home Pages</a></li>
            <li class="nav-item"><span class="current-page">Check Out</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain checkout">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container sm-margin-top-37px">
            <div class="row">

                <!--checkout progress box-->
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="checkout-progress-wrap">
                        @if(Route::has('login'))
                            <form action="{{ route('pages.savecheckout') }}" method="post">
                                @csrf
                                <div class="panel panel-default" style="padding: 30px 30px;">
                                    <div class="panel-header">
                                        <h3 style="text-align: center">Fill in shipping information</h3>
                                    </div>
                                    <hr>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="label-control">Email Address:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input value="{{ Auth::user()->email }}" class="form-control" required type="text" name="email" id="email" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="label-control">Họ Và Tên:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input value="{{ Auth::user()->name }}" class="form-control" required type="text" name="name" id="name" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="label-control">Address:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input placeholder="Enter Address" class="form-control" required type="text" name="address" id="address" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="label-control">Phone:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input value="{{ Auth::user()->phone }}" class="form-control" required type="text" name="phone" id="phone" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="label-control">Note:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <textarea  class="form-control" type="text" name="note"  required id="note" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-footer">
                                        <input type="submit" class="btn btn-primary" name="send_order" value="Send">
{{--                                        <br>--}}
{{--                                        <br>--}}
{{--                                        <input type="text" class="btn btn-primary" value="playment offline">--}}
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>

                <!--Order Summary-->
                @include('pages.checkout.order-summary')

            </div>
        </div>
    </div>
</div>
@endsection
