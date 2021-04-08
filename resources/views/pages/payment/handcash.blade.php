@extends('layouts.pages.base')
@section('title', 'Vnpay')
@section('content')
    <div class="page-contain">

        <div id="main-content" class="main-content">
            <div class="container">
                <nav class="biolife-nav">
                    <ul>
                        <li class="nav-item"><a href="/" class="permal-link">Home Pages</a></li>
                        <li class="nav-item"><span class="current-page">HandCash</span></li>
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
                                        <h3 style="text-align: center;">Information Order</h3>
                                    </div>
                                    <hr>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <th scope="row">Buyer's name</th>
                                                <td>{{ $get_all->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Recipient's name</th>
                                                <td>{{ $get_all->customer_name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Delivery address</th>
                                                <td>{{ $get_all->address }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email address</th>
                                                <td>{{ $get_all->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Total money</th>
                                                <td>{{ $get_all->total }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Payment method</th>
                                                <td>{{ $get_all->method }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>Pendding</td>
                                            </tr>
{{--                                            <tr>--}}
{{--                                                <th scope="row">Order Time</th>--}}
{{--                                                <td>{{ $get_all->created_at }}</td>--}}
{{--                                            </tr>--}}
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


