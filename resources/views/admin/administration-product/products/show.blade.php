@extends('layouts.admin.base')
@section('title', 'Products')
@section('content')
<section style="padding: 30px 0;">
    <div class="container-fluid">
        <div class="row">
            <ul class="float-left">
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li style="float: left; margin: 0 10px;list-style: none">/</li>
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('products.index') }}">Product</a></li>
            </ul>
        </div>
        <hr>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Product details
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-uppercase">Product {{ $product->name }}</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">Image</th>
                                    <td><img src="{{ asset('assets/uploads/products') }}/{{ $product->image }}" width="100" alt=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Regular Price</th>
                                    <td>{{ $product->regular_price }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Sale Price</th>
                                    <td>{{ $product->sale_price }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">SKU</th>
                                    <td>{{ $product->SKU }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>{{ $product->status }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Featured</th>
                                    <td>
                                        @if($product->featured === 0)
                                            Featured
                                        @else
                                            NoFeatured
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Quantity</th>
                                    <td>{{ $product->quantity }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Category</th>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Users</th>
                                    <td>{{ $product->user->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                {!! $product->short_description !!}
            </div>
            <div>
                {!! $product->description !!}
            </div>
        </div>
    </div>
</section>
@endsection
