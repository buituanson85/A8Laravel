@extends('layouts.admin.base')
@section('title', 'Galaxy Product')
@section('content')
    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('products.index') }}">Products</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('products.create') }}">Create Products</a></li>
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
                                        <h3 class="card-title pl-5 text-uppercase font-18">Create Galaxy</h3>
                                    </div>
                                    <div class="col-md-6 pr-5" >
                                        <div class="card-tools" style="float: right;">
                                            <a href="{{ route('products.index') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Table Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <form action="" enctype="multipart/form-data" method="post" class="my-5">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="images">Choose Multiple Image:</label>
                                    <input  type="file" class="form-control" id="images" name="images[]" multiple>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-heard" style="padding: 30px 0 20px 0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="pl-3 text-uppercase font-14">Table Galaxy</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
{{--                                @if(Session::has('success'))--}}
{{--                                    <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--                                        {{ Session::get('success') }}--}}
{{--                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                                <table class="table table-hover data-table">
                                    <thead>
                                    <tr>
                                        <th width="10%">No</th>
                                        <th width="20%">Name</th>
                                        <th width="30%">Product</th>
                                        <th width="10%">Edit</th>
                                        <th width="10%">Destroy</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($galaxys as $galaxy)
                                        <tr>

                                            <td><img src="{{ asset('assets/uploads/galaxy') }}/{{ $galaxy->image }}" width="100" alt=""></td>
                                            <td>{{ $galaxy->name }}</td>
                                            <td>{{ $galaxy->product->name }}</td>
                                            <td>
                                                <a href="#"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</span></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('product.storegalaxy', $product->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $galaxys -> links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

