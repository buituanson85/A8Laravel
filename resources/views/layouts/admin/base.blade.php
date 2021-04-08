<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slider_single_product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/uicons-regular-rounded/css/uicons-regular-rounded.css') }}">
    <style>
        .custom-margin {
            margin-top: 8vh;
        }
        .longin-a {
            list-style: none;
            text-decoration: none;
            color: black;
        }
        .longin-a:hover{
            list-style: none;
            text-decoration: none;
            color: #CCCCCC;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
        <div class="simplebar-content" style="padding: 0;">
            <a class="sidebar-brand" href="/">
                <span class="align-middle">
                    FPT ApTech
                </span>
            </a>

            <ul class="navbar-nav align-self-stretch">

                <li class="sidebar-header">
                    <a href="/">Pages</a>
                </li>
                <li class="">
                    <a class="nav-link text-left active"  role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="flaticon-bar-chart-1"></i>  Dashboard
                    </a>
                </li>
                @foreach($roles as $role)
                    @foreach($role->users as $user)
                        @if(Auth::user()->id == $user->id)
                            <li class="sidebar-header">
                                <span class="ml-3">
                                    @if($role->id == 1)
                                        <i class="fas fa-users"></i>&nbsp;&nbsp;Management User
                                    @elseif($role->id == 2)
                                        <i class="fas fa-gifts"></i>&nbsp;&nbsp;Management Product
                                    @elseif($role->id == 3)
                                        <i class="fas fa-user-tie"></i>&nbsp;&nbsp;Slider
                                    @elseif($role->id == 4)
                                        <i class="fas fa-user-tie"></i>&nbsp;&nbsp;Account
                                    @endif
                                </span>
                            </li>
                            @if(count($role->permissions)>0)
                                @foreach($role->permissions as $permission)
                                    @if($permission ->name != "Logout")
                                        <li class="ml-4">
                                            <a class="text-left" href="{{ route( $permission->url ) }}"/>
                                            {!!$permission->icon !!}
                                            <span>{{ $permission->name }}</span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="ml-3">
                                            <a class="nav-link text-left" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i><span class="ml-3">{{ __('Logout') }}</span>
                                            </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endif
                                @endforeach
                            @else
                                <span class="badge badge-danger">No permission</span>
                            @endif

                        @else

                        @endif
                    @endforeach
                @endforeach

            </ul>

        </div>

    </nav>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div id="content">

            <div class="container-fluid p-0 px-lg-0 px-md-0">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light my-navbar">

                    <!-- Sidebar Toggle (Topbar) -->
                    <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>


                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light " placeholder="Search for..." aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown  d-sm-none">

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                               placeholder="Search for..." >
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown" href="#" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
                                <div class="position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-middle"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                    <span class="indicator">4</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    4 New Notifications
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                                                <div class="text-muted small mt-1">30m ago</div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li>
                        <!-- Nav Item - Messages -->
                        <li class="nav-item">
                            <a class="nav-link " href="#"
                               role="button">
                                <i class="fas fa-envelope"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600">{{ Auth::user()->name }}</span>
{{--                                <img class="img-profile rounded-circle" src="{{ asset('assets/uploads/users') }}/{{ Auth::user()->photo }}">--}}
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-left">
                            <p class="mb-0">
                                <a href="/" class="text-muted"><strong>Dashboard Vishweb Design </strong></a> &copy
                            </p>
                        </div>
                        <div class="col-6 text-right">
                            <ul class="list-inline">
                                <li class="footer-item">
                                    <a class="text-muted" href="#">Support</a>
                                </li>
                                <li class="footer-item">
                                    <a class="text-muted" href="#">Help Center</a>
                                </li>
                                <li class="footer-item">
                                    <a class="text-muted" href="#">Privacy</a>
                                </li>
                                <li class="footer-item">
                                    <a class="text-muted" href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <!-- /#users-content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>--}}
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="{{ asset('assets/js/slider_single_product.js') }}"></script>
<script src="{{ asset('assets/js/slider_single_product2.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('.choose').on('change',function () {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='city'){
                result = 'district';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{
                    action:action,
                    ma_id:ma_id,
                    _token:_token
                },
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });

        $('.chooses').on('change',function () {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var shipping_city = $('.shipping_city').val();
            var shipping_maqh = $('.shipping_maqh').val();
            var shipping_xa = $('.shipping_xa').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='citys'){
                result = 'districts';
            }else{
                result = 'wardss';
            }
            $.ajax({
                url : '{{url('/select-deliverys')}}',
                method: 'POST',
                data:{
                    action:action,
                    ma_id:ma_id,
                    shipping_city:shipping_city,
                    shipping_maqh:shipping_maqh,
                    shipping_xa:shipping_xa,
                    _token:_token
                },
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });

        $('.add_delivery').click(function(){

            var city = $('.city').val();
            var district = $('.district').val();
            var wards = $('.wards').val();
            var shipping = $('.shipping').val();
            var _token = $('input[name="_token"]').val();
            // alert(city);
            // alert(district);
            // alert(wards);
            // alert(shipping);
            $.ajax({
                url : '{{ url('/insert-delivery') }}',
                method: 'POST',
                data:{
                    city:city,
                    district:district,
                    wards:wards,
                    shipping:shipping,
                    _token:_token
                },
                success:function(data){
                    alert('ok')
                }
            });
        });

    });
</script>


<script>

    $('#bar').click(function(){
        $(this).toggleClass('open');
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );

    });
</script>

<script language="javascript">
    function ChangeToSlug()
    {
        var name, slug;

        //Lấy text từ thẻ input title
        name = document.getElementById("name").value;

        //Đổi chữ hoa thành chữ thường
        slug = name.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
</script>





</body>
</html>

