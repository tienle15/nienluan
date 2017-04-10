<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('public/css/sb-admin.css') }}" rel="stylesheet">
    <!-- Theme Fonts -->
    <link href="{{ asset('public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Admin - Terracotta Hotel & Resort</title>
</head>

<body>
<style>
    #wrapper {
        padding-left: 0px !important;
    }
    body {
        background-color: #f8f8f8;
    }
    .form-login{
        margin-top: 30px !important;
                
    }
</style>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html"> Hệ Thống Đặt Phòng - Terracotta Hotel & Resort</a>
            </div>

        </nav>
    </div>
    <div class="container-fluid">
        <div class="col-xs-8 col-sm-6 col-md-4 col-lg-4 col-xs-offset-2 col-sm-offset-3 col-md-offset-4 col-lg-offset-4">
            <div class="panel panel-default form-login">
                <div class="panel-heading">
                    <h1 class="text-center">Đăng Nhập</h1>
                </div>
                <form action={{ url('quanli') }} name="formdangnhap" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="panel-body">
                        <div class="form-group">
                            <label>Tên tài khoản</label>
                            <input type="text" class="form-control" placeholder="Nhập tài khoản email" name="txtEmail" value="{{ old('txtEmail')}}">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="txtMatKhau">
                        </div>

                            @if(count($errors) >0)
                                <div style="color: red; margin-bottom: -10px; margin-left: 20px; margin-top: -10px">
                                    @foreach($errors->all() as $error)
                                        {{ $error }} <br>
                                    @endforeach
                                </div>
                            @endif                        

                        <div class="form-group" style="margin-top: 20px">
                            <button class="btn btn-primary btn-block col-xs-4">
                                <h5><b>Đăng Nhập</h5>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>   
            </div>
        </div>
    </div>


    
    <!-- /#wrapper -->







    <!-- jQuery -->
    <script src="{{ asset('public/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    
</body>
</html>