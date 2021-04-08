@extends('layouts.admin.base')
@section('title', 'Products')
@section('content')

    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('categories.index') }}">Products</a></li>
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
                                        <h3 class="card-title pl-3 text-uppercase font-18">Table Products</h3>
                                    </div>
                                    <div class="col-md-6 pr-5" >
                                        <div class="card-tools" style="float: right;">
                                            <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <form action="{{ route('products.index') }}" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="" class="col-md-12 control-label" >Search</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="name" id="name" value="" placeholder="Product Name" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="" class="col-md-12 control-label" >Category:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="category_id" id="category_id">
                                                            <option value="">===== Select Category =====</option>
                                                            @foreach($categories as $category)
                                                                <option
                                                                    {{ $category->id == $category_id ? 'selected' : ''}}
                                                                    value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <table class="table table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>User name</th>
                                            <th>Galaxy</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Destroy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td><img src="{{ asset('assets/uploads/products') }}/{{ $product->image }}" width="60" alt=""></td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                @if($product->status == "instock")
                                                    <a href=" {{ route('admin.unlockstatustproduct',$product->id) }}"><i class="fas fa-unlock-alt" style="font-size: 18px; color: chartreuse"></i></a>
                                                @else
                                                    <a href="{{ route('admin.lockstatustproduct',$product->id) }}"><i class="fas fa-lock" style="font-size: 18px; color: red;"></i></a>
                                                @endif
                                            </td>
                                            <td>{{ $product->regular_price }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->brand->name }}</td>
                                            <td>{{ $product->user->name }}</td>
                                            <td>
                                                @if($product->user_id === Auth::user()->id)
                                                <a href="{{ route('product.galaxys', $product->id ) }}"><span class="btn btn-sm btn-light"><i class="fa fa-eye"></i>&nbsp;Galaxy</span></a>
{{--                                                    <a href="{{ route('images.show', $product->id ) }}"><span class="btn btn-sm btn-light"><i class="fa fa-eye"></i>&nbsp;Galaxy</span></a>--}}
                                                @else
                                                    N/V
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('products.show', $product->id ) }}"><span class="btn btn-sm btn-info"><i class="fa fa-eye"></i>&nbsp;View</span></a>
                                            </td>
                                            <td>
                                                @if($product->user_id === Auth::user()->id)
                                                    <a  href="{{ route('products.edit' , $product->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</span></a>
                                                @else
                                                    N/V
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->user_id === Auth::user()->id)
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                    </form>
                                                @else
                                                    N/V
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    {{ $products->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
