@extends('layouts.admin.base')
@section('title', 'Sliders')
@section('content')

    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('sliders.index') }}">SLiders</a></li>
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
                                        <h3 class="card-title pl-3 text-uppercase font-18">Table Sliders</h3>
                                    </div>
                                    <div class="col-md-6 pr-5" >
                                        <div class="card-tools" style="float: right;">
                                            <a href="{{ route('sliders.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Images</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
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
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Stock</th>
                                        <th>Species</th>
                                        <th>Edit</th>
                                        <th>Destroy</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td><img src="{{ $slider->image }}" width="60" alt=""></td>
                                            <td>{{ $slider->name }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->short_description }}</td>
                                            <td>
                                                @if($slider->status == "instock")
                                                    <a href=" {{ route('admin.unlockstatustslider',$slider->id) }}"><i class="fas fa-unlock-alt" style="font-size: 18px; color: chartreuse"></i></a>
                                                @else
                                                    <a href="{{ route('admin.lockstatustimage',$slider->id) }}"><i class="fas fa-lock" style="font-size: 18px; color: red;"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($slider->species == "one")
                                                    <a href=" {{ route('admin.unlockspeciesslider',$slider->id) }}">Slider header</a>
                                                @else
                                                    <a href="{{ route('admin.lockspeciesslider',$slider->id) }}">Slider Banner</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a  href="{{ route('sliders.edit' , $slider->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</span></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('sliders.destroy', $slider->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
{{--                                {{ $images->links('pagination::bootstrap-4') }}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

