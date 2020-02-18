<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/dashboard/">
    <script src="https://kit.fontawesome.com/9174f7bc91.js" crossorigin="anonymous"></script>

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="{{ asset('theme_admin/css/dashboard.css') }}" rel="stylesheet">
     <!--  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Xin chào {{ get_data_user('admins','name') }}</a>
            </div>
            <div id="navbar" clas s="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('admin.logout') }}">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="{{ \Request::route()->getName() == 'admin.home' ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}">Trang Tổng Quan</a>
                    </li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.category' ? 'active' : '' }}"><a href="{{ route('admin.get.list.category') }}">Danh Mục</a></li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.product' ? 'active' : '' }}"><a href="{{ route('admin.get.list.product') }}">Sản Phẩm</a></li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.rating' ? 'active' : '' }}"><a href="{{ route('admin.get.list.rating') }}">Đánh Giá</a></li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.article' ? 'active' : '' }}"><a href="{{ route('admin.get.list.article') }}">Tin Tức</a></li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.transaction' ? 'active' : '' }}"><a href="{{ route('admin.get.list.transaction') }}">Đơn Hàng</a></li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.user' ? 'active' : '' }}"><a href="{{route('admin.get.list.user')}}">Thành Viên</a></li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.contact' ? 'active' : '' }}"><a href="{{route('admin.get.list.contact')}}">Liên Hệ</a></li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.paga_static' ? 'active' : '' }}"><a href="{{route('admin.get.list.paga_static')}}">Page tĩnh</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @if(\Session::has('success'))
                <div class="alert alert-success alert-dismissible thongbao">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thành công! </strong>{{ \Session::get('success') }}
                </div>
                @endif

                @if(\Session::has('danger'))
                <div class="alert alert-danger alert-dismissible thongbao">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thất bại! </strong>{{ \Session::get('danger') }}
                </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('theme_admin/js/bootstrap.min.js') }}"></script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#out_img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#input_img").change(function() {
                readURL(this);
            });
        </script>
        @yield('script')
    </body>

    </html>