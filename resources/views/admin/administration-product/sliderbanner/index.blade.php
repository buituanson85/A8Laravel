@extends('layouts.admin.base')
@section('title', 'Slider Banner')
@section('content')

    <section style="padding: 30px 0;">
        <div class="container-fluid">
            <div class="row">
                <ul class="float-left">
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li style="float: left; margin: 0 10px;list-style: none">/</li>
                    <li style="float: left;list-style: none"><a class="longin-a" href="{{ route('sliderbanner.index') }}">SLiders Banner</a></li>
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
                                        <h3 class="card-title pl-3 text-uppercase font-18">Table Slider</h3>
                                    </div>
                                    <div class="col-md-6 pr-5" >
                                        <div class="card-tools" style="float: right;">
                                            <a href="{{ route('sliderbanner.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Slider</a>
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
                                        <th>Title One</th>
                                        <th>Regular Price</th>
                                        <th>Sale Price</th>
                                        <th>Stock</th>
                                        <th>Edit</th>
                                        <th>Destroy</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliderbanners as $sliderbanner)
                                        <tr>
                                            <td>{{ $sliderbanner->id }}</td>
                                            <td><img src="{{ $sliderbanner->image }}" width="60" alt=""></td>
                                            <td>{{ $sliderbanner->name }}</td>
                                            <td>{{ $sliderbanner->title_one }}</td>
                                            <td>{{ $sliderbanner->regular_price }}</td>
                                            <td>{{ $sliderbanner->sale_price }}</td>
                                            <td>
                                                @if($sliderbanner->status == "instock")
                                                    <a href=" {{ route('admin.unlockstatustsliderbanner',$sliderbanner->id) }}"><i class="fas fa-unlock-alt" style="font-size: 18px; color: chartreuse"></i></a>
                                                @else
                                                    <a href="{{ route('admin.lockstatustsliderbanner',$sliderbanner->id) }}"><i class="fas fa-lock" style="font-size: 18px; color: red;"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a  href="{{ route('sliderbanner.edit' , $sliderbanner->id) }}"><span class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Edit</span></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('sliderbanner.destroy', $sliderbanner->id) }}" method="post">
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


