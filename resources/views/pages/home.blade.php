@extends('layouts.pages.base')
@section('title', 'Home Pages')
@section('content')
    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

        @include('pages.slider')

        <!--Block 02: Banner-->

        @include('pages.banner')

        <!--Block 03: Product Tab-->

        @include('pages.product-tab')

        <!--Block 04 - 05: Banner Promotion 01 -->

        @include('pages.banner-promotion')

        <!--Block 06: Products Deals-->

        @include('pages.product-deals')

        <!--Block 07: Brands-->

        @include('pages.brands-home')

        <!--Block 08: Blog Posts-->

            @include('pages.blog-post')

        </div>

    </div>
@endsection
