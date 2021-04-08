@extends('layouts.admin.base')
@section('title', 'Category')
@section('content')

<section style="padding: 30px 0;">
    <div class="container-fluid">
        <div class="row">
            <ul class="float-left">
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li style="float: left; margin: 0 10px;list-style: none">/</li>
                <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('categories.index') }}">Categories</a></li>
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
                                        <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Category</a>
{{--                                        <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#Registration"><i class="fas fa-plus-circle"></i>Create Category </button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body p-0">
                            <form action="{{ route('categories.index') }}" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="col-md-12 control-label" >Search</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" name="name" id="name" value="" placeholder="Category Name" class="form-control input-md">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="" class="col-md-12 control-label" >Category Parent:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" name="category_id" id="category_id">
                                                    <option value="">===== Select Category Parent =====</option>
                                                    @foreach($categoriesParent as $categoryParent)
                                                        @if($categoryParent -> parent == 0)
                                                            <option
                                                                {{ $categoryParent->id == $category_id ? 'selected' : ''}}
                                                                value="{{ $categoryParent->id }}">{{ $categoryParent->name }}</option>
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
                                        <th width="20%">Name</th>
                                        <th width="20%">Slug</th>
                                        <th width="30%">Description</th>
                                        <th width="20%">Status</th>
                                        <th width="20%">Parent</th>
                                        <th width="10%">Edit</th>
                                        <th width="10%">Destroy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $key => $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            @if($category->status == "instock")
                                                <a href=" {{ route('admin.unlockstatustcategory',$category->id) }}"><i class="fas fa-unlock-alt" style="font-size: 18px; color: chartreuse"></i></a>
                                            @else
                                                <a href="{{ route('admin.lockstatustcategory',$category->id) }}"><i class="fas fa-lock" style="font-size: 18px; color: red;"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($category->parent == 0)
                                                =====
                                            @else
                                                Danh muc con
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</span></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $categories -> links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
