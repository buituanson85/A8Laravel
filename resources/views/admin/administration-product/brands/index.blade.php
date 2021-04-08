@extends('layouts.admin.base')
@section('title', 'Brands')
@section('content')

<section style="padding: 30px 0;">
    <div class="container-fluid">
        <div class="row">
            <ul class="float-left">
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li style="float: left; margin: 0 10px;list-style: none">/</li>
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('brands.index') }}">Brands</a></li>
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
                                    <h3 class="card-title pl-3 text-uppercase font-18">Table Brand</h3>
                                </div>
                                <div class="col-md-6 pr-5" >
                                    <div class="card-tools" style="float: right;">
                                        <a href="{{ route('brands.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Brand</a>
{{--                                        <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#Registration"><i class="fas fa-plus-circle"></i>Create Category </button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body p-0">
                            <form action="{{ route('brands.index') }}" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="col-md-12 control-label" >Search</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" name="name" id="name" value="" placeholder="Brand Name" class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="" class="col-md-12 control-label" >Brand Parent:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" name="brand_id" id="brand_id">
                                                    <option value="">===== Select Brand Parent =====</option>
                                                    @foreach($brandsParent as $brandParent)
                                                        @if($brandParent -> parent == 0)
                                                            <option
                                                                {{ $brandParent->id == $brand_id ? 'selected' : ''}}
                                                                value="{{ $brandParent->id }}">{{ $brandParent->name }}</option>
                                                        @endif
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
                                        <th width="10%">Name</th>
                                        <th width="10%">Slug</th>
                                        <th width="30%">Description</th>
                                        <th width="20%">Status</th>
                                        <th width="20%">Parent</th>
                                        <th width="10%">Edit</th>
                                        <th width="10%">Destroy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $key => $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->slug }}</td>
                                        <td>{{ $brand->description }}</td>
                                        <td>
                                            @if($brand->status == "instock")
                                                <a href=" {{ route('admin.unlockstatustbrand',$brand->id) }}"><i class="fas fa-unlock-alt" style="font-size: 18px; color: chartreuse"></i></a>
                                            @else
                                                <a href="{{ route('admin.lockstatustbrand',$brand->id) }}"><i class="fas fa-lock" style="font-size: 18px; color: red;"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($brand->parent == 0)
                                                =====
                                            @else
                                                Thương hiệu con
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('brands.edit', $brand->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</span></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('brands.destroy', $brand->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $brands -> links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
