@extends('layouts.pages.base')
@section('title', 'Vnpay')
@section('content')
    <div class="page-contain">

        <div id="main-content" class="main-content">
            <div class="container">
                <nav class="biolife-nav">
                    <ul>
                        <li class="nav-item"><a href="/" class="permal-link">Home Pages</a></li>
                        <li class="nav-item"><span class="current-page">HandCash ATM</span></li>
                    </ul>
                </nav>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="content-cash">
                            <h1 class="heading">Thanks You</h1>
                            <h2 class="title">Order Success! Thank you for purchasing our product.</h2>
                            <p>We will confirm the order as soon as possible, you can track the order details through registered gmail.</p>
                            <a class="button btn btn-danger" href="/">Go to Home</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-danger">
                                    <div class="panel-header">
                                        <h3 style="text-align: center;">Transaction information</h3>
                                    </div>
                                    <hr>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <th scope="row">Trading code</th>
                                                <td>{{ $vnpays['p_trasaction_code'] }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Amount of money</th>
                                                <td>{{ $vnpays['p_money'] }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Response code</th>
                                                <td>{{ $vnpays['p_vnp_response_code'] }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Transaction code in vnpay</th>
                                                <td>{{ $vnpays['p_code_vnpay'] }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Bank Code</th>
                                                <td>{{ $vnpays['p_code_bank'] }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Payment time</th>
                                                <td>{{ $vnpays['p_time'] }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Return</th>
                                                <td>Successful transaction</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="panel-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

