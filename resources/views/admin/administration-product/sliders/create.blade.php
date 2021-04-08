@extends('layouts.admin.base')
@section('title', 'Create Slider')
@section('content')

    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('sliders.index') }}">Sliders</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('sliders.create') }}">Create Sliders</a></li>
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
                                        <h3 class="card-title pl-5 text-uppercase font-18">Create Sliders</h3>
                                    </div>
                                    <div class="col-md-6 pr-5" >
                                        <div class="card-tools" style="float: right;">
                                            <a href="{{ route('sliders.index') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Table Slider</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <form class="form-horizontal" id="imageForm" action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="col-md-10 control-label" >Image Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="name" id="name" value="" placeholder="Images Name" class="form-control input-md" required  data-parsley-trigger="keyup">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="" class="col-md-10 control-label" >Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="title" id="title" value="" placeholder="Images Title" class="form-control input-md" required  data-parsley-trigger="keyup">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="" class="col-md-10 control-label" >Short Description</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="short_description" id="short_description" value="" placeholder="Enter Short Description" class="form-control input-md" required  data-parsley-trigger="keyup">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="" class="col-md-6 control-label" >Stock</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="status" id="status" required data-parsley-trigger="keyup">
                                                        <option value="">===== Select Option =====</option>
                                                        <option value="instock">InStock</option>
                                                        <option value="outofstock">Out of Stock</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="" class="col-md-6 control-label" >Species</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="species" id="species" required data-parsley-trigger="keyup">
                                                        <option value="">===== Select Option =====</option>
                                                        <option value="one">Slider Header</option>
                                                        <option value="two">Slider Banner</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="" class="col-md-6 control-label" >Image</label>
                                                        <div class="col-md-6">
                                                            <input type="file" name="image" id="image" class="input-file" alt="abc" required data-parsley-trigger="keyup">
                                                            <div class="image-preview" id="imagePreview">
                                                                <img class="image-preview__image" width="150px" src="" id="img_thumbnail" alt="">
                                                                <span id="store_image" class="image-preview__default-text"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-6 control-label" ></label>
                                        <div class="col-md-6">

                                        </div>
                                    </div>

                                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
                                    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>
                                    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

                                    <style>
                                        .parsley-errors-list li{
                                            list-style: none;
                                            color: red;
                                        }
                                    </style>
                                    <script>
                                        $(function () {
                                            $("#imageForm").parsley();
                                        });
                                    </script>

                                </div>
                                <div class="card-footer">
                                    <input type="submit" name="storeProduct" class="btn btn-primary">
                                    {{--                                <i class="fas fa-save"></i>--}}
                                    {{--                                &nbsp;Submit</input>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

