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
                <li class="nav-item"><span class="current-page">Pay ment</span></li>
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
                                    <div class="panel panel-default" style="padding: 10px 30px;">
                                        <form action="{{ route('pages.savecheckout') }}" method="post">
                                            @csrf
                                        <div class="panel-header">
                                            <h3 style="text-align: center">Shipping information</h3>
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
                                                            <input value="{{ $shipping->email }}" class="form-control" type="text" name="email" id="email" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="label-control">Họ Và Tên:</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input value="{{ $shipping->customer_name }}" class="form-control" type="text" name="name" id="name" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="label-control">Address:</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input  value="{{$shipping->address}}" class="form-control" type="text" name="address" id="address" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="label-control">Phone:</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input value="{{ $shipping->customer_phone }}" class="form-control" type="text" name="phone" id="phone" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="label-control">Note:</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <textarea  class="form-control" type="text" name="note" id="note" readonly>{{ $shipping->note }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        </form>
                                        <div class="panel-footer">
                                            <form action="{{ route('pages.changepayment') }}">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Change delivery information</button>
                                            </form>
                                        </div>
                                    </div>
                            @endif
                            <div class="panel panel-default" style="padding: 20px 20px;">
                                <div class="panel-header">
                                    <h3 style="text-align: center">Select Payment Method</h3>
                                </div>
                                <hr>
                                <form action="{{ route('pages.orderplace') }}" method="post">
                                    @csrf
                                <div class="panel-body">
                                    <div class="row" style="text-align: center;">
                                        <div class="col-md-6">
                                            <label><input type="checkbox" onclick="return ValidatePetSelection();" name="payment_option" class="btn btn-sm btn-primary" value="ATM">&nbsp;&nbsp;Direct Bank Transfer</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label><input type="checkbox" onclick="return ValidatePetSelection();" name="payment_option" class="btn btn-sm btn-primary" value="CASH">&nbsp;&nbsp;Payment in cash</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input type="submit" class="btn btn-sm btn-primary" value="payment">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--Order Summary-->
                    @include('pages.checkout.order-summary')

                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
    function ValidatePetSelection()
    {
        var checkboxes = document.getElementsByName("payment_option");
        var numberOfCheckedItems = 0;
        for(var i = 0; i < checkboxes.length; i++)
        {
            if(checkboxes[i].checked)
                numberOfCheckedItems++;
        }
        if(numberOfCheckedItems > 1)
        {
            alert("You are only allowed to choose one form of payment!");
            return false;
        }
    }
</script>
