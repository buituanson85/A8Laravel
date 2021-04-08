@extends('layouts.admin.base')
@section('title', 'Orders')
@section('content')

    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('orders.index') }}">Orders</a></li>
                </ul>
            </div>
            <hr>
            <div class="container pt-3">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-heard" style="padding: 30px 0 20px 0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="card-title pl-3 text-uppercase font-18">Table Orders</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                @include('partials.alert')
                                <table class="table table-hover data-table">
                                    <thead>
                                    <tr>
                                        <th width="10%">No</th>
                                        <th width="10%">Order code</th>
                                        <th width="10%">Total money</th>
                                        <th width="10%">Method</th>
                                        <th width="20%">Created at</th>
                                        <th width="10%">View</th>
                                        <th width="10%">Status</th>
{{--                                        <th width="10%">Edit</th>--}}
                                        <th width="5%">Destroy</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $index = 0;
                                    @endphp
                                    @foreach($orders as $key => $order)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->method }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                <a href="{{ route('orders.show', $order->order_id ) }}"><span class="btn btn-sm btn-info"><i class="fa fa-eye"></i>&nbsp;View</span></a>
                                            </td>
                                            <td>

                                                <form action="{{ route('pages.orderdetailsdelivering') }}" method="post">
                                                    @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                                <input type="hidden" name="customer_id" value="{{ $order->customer_id }}">
                                                <input type="hidden" name="shipping_id" value="{{ $order->shipping_id }}">
                                                <input type="hidden" name="payment_id" value="{{ $order->payment_id }}">
                                                <input type="hidden" name="total" value="{{ $order->total }}">
                                                @if($order->status == 0)
                                                    <button type="submit" class="btn btn-sm btn-warning">Pendding</button>
                                                @elseif($order->status == 1)
                                                    <button type="submit" class="btn btn-sm btn-success">Delivering</button>
                                                @elseif($order->status == 2)
                                                    <a type="submit" class="btn btn-sm btn-default">Received</a>
                                                @endif
                                                </form>

                                            </td>
                                            <td>
                                                @if($order->status == 0 || $order->status == 2)
                                                <form action="{{ route('orders.destroy', $order->order_id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                </form>
                                                @else

                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
{{--                                {{ $brands -> links('pagination::bootstrap-4') }}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

