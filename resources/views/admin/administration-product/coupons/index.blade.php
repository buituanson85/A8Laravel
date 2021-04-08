@extends('layouts.admin.base')
@section('title', 'Coupons')
@section('content')

    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('categories.index') }}">Coupons</a></li>
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
                                        <h3 class="card-title pl-3 text-uppercase font-18">Table Category</h3>
                                    </div>
                                    <div class="col-md-6 pr-5" >
                                        <div class="card-tools" style="float: right;">
                                            <a href="{{ route('coupons.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Category</a>
                                            {{--                                        <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#Registration"><i class="fas fa-plus-circle"></i>Create Category </button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body p-0">
                                <form action="{{ route('coupons.index') }}" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="" class="col-md-12 control-label" >Search</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="name" id="name" value="" placeholder="Coupon Name" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="" class="col-md-12 control-label" >Coupon:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="coupon_id" id="category_id">
                                                            <option value="">===== Select Coupon =====</option>
                                                            @foreach($couponsParent as $couponParent)
                                                                <option
                                                                    {{ $couponParent->id == $coupon_id ? 'selected' : ''}}
                                                                    value="{{ $couponParent->id }}">{{ $couponParent->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>

                                </form>
                                @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <table class="table table-hover data-table">
                                    <thead>
                                    <tr>
                                        <th width="10%">No</th>
                                        <th width="20%">Name</th>
                                        <th width="20%">Code</th>
                                        <th width="30%">Quantity</th>
                                        <th width="20%">Features</th>
                                        <th width="20%">price</th>
                                        <th width="10%">Edit</th>
                                        <th width="10%">Destroy</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupons as $key => $coupon)
                                        <tr>
                                            <td>{{ $coupon->id }}</td>
                                            <td>{{ $coupon->name }}</td>
                                            <td>{{ $coupon->code }}</td>
                                            <td>{{ $coupon->quantity }}</td>
                                            <td>
                                                @if($coupon->features == "percent")
                                                    Discount by %
                                                @else
                                                    Discount by money
                                                @endif
                                            </td>
                                            <td>
                                                @if($coupon->features == "percent")
                                                    {{ $coupon->price }}%
                                                @else
                                                    £{{ $coupon->price }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('coupons.edit', $coupon->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</span></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('coupons.destroy', $coupon->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $coupons -> links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

