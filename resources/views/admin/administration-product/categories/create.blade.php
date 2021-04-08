@extends('layouts.admin.base')
@section('title', 'Create Category')
@section('content')

    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('categories.index') }}">Categories</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('categories.create') }}">Create Category</a></li>
                </ul>
            </div>
            <hr>
            <div class="container pt-3">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <div class="card">
                            <div class="card-heard" style="padding: 30px 0 20px 0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="card-title pl-5 text-uppercase font-18">Create Category</h3>
                                    </div>
                                    <div class="col-md-6 pr-5" >
                                        <div class="card-tools" style="float: right;">
                                            <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Table Category</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <form class="form-horizontal" id="categoryForm" action="{{ route('categories.store') }}" method="post">
                                @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 offset-md-2">
                                            <div class="form-group">
                                                <label class="col-md-6 col-form-label">Category Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="Category Name" id="name" onkeyup="ChangeToSlug()" name="name" class="form-control input-md" data-parsley-trigger="keyup">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-6 col-form-label">Category Slug</label>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="Category Slug" id="slug" name="slug" class="form-control input-md" data-parsley-trigger="keyup">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-6 col-form-label">Category Icon</label>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="Category Icon" id="icon" name="icon" class="form-control input-md" data-parsley-trigger="keyup">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-6 col-form-label">Category Description</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" placeholder="Description" id="description" name="description" data-parsley-trigger="keyup"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-6 col-form-label">Category Status</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" id="status" name="status" required data-parsley-trigger="keyup">
                                                        <option value="">Select Option</option>
                                                        <option value="instock">InStock</option>
                                                        <option value="outofstock">Out of Stock</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-6 col-form-label">Category Parent</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" id="parent" name="parent" required data-parsley-trigger="keyup">
                                                        <option value="0">=== Category Parent ===</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group pt-3">
                                                <label class="col-md-6 control-label"></label>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

                                <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
                                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>
                                <style>
                                    .parsley-errors-list li{
                                        list-style: none;
                                        color: red;
                                    }
                                </style>
                                <script>
                                    $(function () {
                                        $("#categoryForm").parsley();
                                    });
                                </script>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
