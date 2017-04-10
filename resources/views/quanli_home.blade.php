<?php
    $maql = Auth::user()->maql;
    $name = Auth::user()->name;
    $email = Auth::user()->email;

    //Lấy ra một cái object mã ql
    $ma_list = Auth::user()->select('maql')->get();
    $max = 0;
    foreach ($ma_list as $value){
        $catchuoi = substr($value->maql, 2);
        if($catchuoi > $max)
            $max = $catchuoi;
    }
    //Lấy số cao nhất + 1
    $so = $max + 1;
    //echo '<pre>';
    //print_r($maql);

    //Ghép lại chuỗi vừa cộng với QL để ra mã ql tự tăng
    if($so < 10)
        $maql_new = 'QL0'.$so;
    else
        $maql_new = 'QL'.$so;
?>


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
    
    <!-- ajax -->
    <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- datepicker -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">

    <!-- ckeditor -->
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
    <!-- fileinput plugins -->
    <link href="{{ asset('public/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Admin - Terracotta Hotel & Resort</title>

<script type="text/javascript">
    // datepicker
        $(function () {
                $("#txtngayBD").datepicker({
                    dateFormat : 'dd-mm-yy',
                    minDate: 0,
                    onClose: function (selectedDate) {
                        if (selectedDate != ""){ 
                            $("#txtngayKT").datepicker("option", "minDate", selectedDate); }
                    }
                });
                $("#txtngayKT").datepicker({
                    dateFormat : 'dd-mm-yy',
                    minDate: 'selectedDate',
                    
                });
        });


    <!--// Thêm quản lí viết bằng ajax  -->
    $(document).ready(function(){
        $("#saveTT2").click(function(){
            //Lấy dữ liệu gửi qua ajax
            var url = "http://localhost/nienluan-ktpm/quanli/themql";
            var _token = $("form[name='form_them']").find("input[name='_token']").val();
            var maql = $("#maQL").val();
            var name = $("#tenQL").val();
            var email = $("#emailQL").val();
            var password1 = $("#mKhau1").val();
            var password2 = $("#mKhau2").val();

            $.ajax({
                url : url,
                type : "POST",
                dataType : "JSON",
                data : {"_token":_token,"maql":maql, "name":name, "email":email, "password1":password1, "password2":password2},
                success : function(result){
                    if(!result.success){
                        var html1 = '';
                        var html2 = '';
                        var html3 = '';
                        var html4 = '';
                        $.each(result.errors, function(key, item){
                            if(key == 'name')
                                html1 = item;
                            if(key == 'email')
                                html2 = item;
                            if(key == 'password1')
                                html3 = item;
                            if(key == 'password2')
                                html4 = item;
                        });
                        $("#ero1").html(html1);
                        $("#ero2").html(html2);
                        $("#ero3").html(html3);
                        $("#ero4").html(html4);
                    }
                    else{
                        $("#modalAddAdmin").modal('hide');
                        alert('Thêm thành công');
                        location.reload(true); //hàm refresh trang
                    }
                }
            });
        });
    });

    //Chỉnh sửa thông tin quản lí
    $(document).ready(function(){
        $("#saveTT1").click(function(){
            //Lấy thông tin truyền qua ajax
            url = "http://localhost/nienluan-ktpm/quanli/thongtinql";
            var _token = $("form[name='form_thongtin']").find("input[name='_token']").val();
            var maql = $("#maQL1").val();
            var email = $("#emailQL1").val();
            var password1 = $("#mKhau11").val();
            var password2 = $("#mKhau22").val();

            $.ajax({
                url : url,
                type : "POST",
                dataType : "JSON",
                data : {"maql":maql,"email":email, "password1":password1, "password2":password2,  "_token":_token},
                success : function(result){
                    if(!result.success){
                        var html5 = '';
                        var html6 = '';
                        var html7 = '';
                        $.each(result.errors, function(key, item){
                            if(key == 'email')
                                html5 = item;
                            if(key == 'password1')
                                html6 = item;
                            if(key == 'password2')
                                html7 = item;
                        });
                        $("#ero5").html(html5);
                        $("#ero6").html(html6);
                        $("#ero7").html(html7);
                    }else{
                        $("#modalProfile").modal('hide');
                        alert('Cập nhật thông tin thành công');
                        location.reload(true);
                    }
                }
            });
        });
    });
</script>


</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ asset('home') }}" target="_blank"> Hệ Thống Đặt Phòng - Terracotta Hotel & Resort</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu" >
                        <li>
                            <a href="#modalProfile" data-toggle="modal"><i class="fa fa-fw fa-user"></i> Thông tin</a>
                        </li>
                        <li>
                            <a href="#modalAddAdmin" data-toggle="modal"><i class="fa fa-fw fa-plus"></i> Thêm quản lí</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ asset('dangxuat') }}"><i class="fa fa-fw fa-power-off"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li  class="@yield('active_qldp')">
                        <a href="{{ asset('quanli/qldatphong') }}"><i class="fa fa-fw fa-calendar"></i> Quản lí Đặt Phòng</a>
                    </li>
                    <li class="@yield('active_qlp')">
                        <a href="{{ asset('quanli/qlphong') }}"><i class="glyphicon glyphicon-lamp"></i> Quản lí Phòng</a>
                    </li>
                    <li class="@yield('active_qldv')">
                        <a href="{{ asset('quanli/qldichvu') }}"><i class="fa fa-fw fa-glass"></i> Quản lí Dịch Vụ</a>
                    </li>

                    <li class="@yield('active_km')">
                        <a href="{{ asset('quanli/khuyenmai') }}"><i class="fa fa-fw fa-gift"></i> Khuyến mãi </a>
                    </li>                   
                    <li class="@yield('active_ykien')">
                        <a href="{{ asset('quanli/ykien') }}"><i class="fa fa-fw fa-comments-o"></i> Ý kiến đóng góp</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <!-- Modal add Admin-->
        <div class="modal fade" id="modalAddAdmin" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm" role="document">
                <!-- Modal content-->
                <form name="form_them" action="{{ action('quanLiController@luuThemQL') }}" method="post">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-content">
                        <div class="modal-header ">
                            <button  type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center">Thêm quản lí</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Mã quản lí</label>
                                    <input type="text" id="maQL" class="form-control" readonly="" value="{{ $maql_new }}" name="txtMaQL">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Tên quản lí</label>
                                    <input type="text" id="tenQL" class="form-control" placeholder="Nhập họ tên" name="name">
                                    <p id="ero1" style='color:red; margin-bottom: -15px; margin-top: 5px'></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Email</label>
                                    <input type="text" id="emailQL" class="form-control" placeholder="Nhập email" name="email">
                                    <p id="ero2" style='color:red; margin-bottom: -15px; margin-top: 5px'></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Mật Khẩu</label>
                                    <input type="password" id="mKhau1" class="form-control" placeholder="Nhập mật khẩu" name="password1">
                                    <p id="ero3" style='color:red; margin-bottom: -15px; margin-top: 5px'></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Xác nhận mật khẩu</label>
                                    <input type="password" id="mKhau2" class="form-control" placeholder="Nhập lại mật khẩu" name="password2">
                                    <p id="ero4" style='color:red; margin-bottom: -15px; margin-top: 5px'></p>
                                </div>
                            </div>

                            <div id="pass" style="color: green; margin-bottom: 5px; margin-top: 5px">
                                
                            </div>

                            <div class="col-md-8 col-md-offset-2">
                                <button type="button" id="saveTT2" class="btn btn-primary btn-block">Lưu lại</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
                <!-- /Modal content -->
            </div>
        </div>
        <!-- /Modal add Admin-->


        <!-- Modal Profile-->
        <div class="modal fade" id="modalProfile" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm" role="document">
                <!-- Modal content-->
                <form name="form_thongtin" action="" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-content">
                        <div class="modal-header ">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center">Thông Tin Quản Lí</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Mã quản lí</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $maql }}" id="maQL1" name="maql">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Tên tên quản lí</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $name }}" id="tenQL1" name="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="{{ $email }}" id="emailQL1" name="email">
                                    <p id="ero5" style='color:red; margin-bottom: -15px; margin-top: 5px'></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" class="form-control" placeholder="Nhập mật khẩu" id="mKhau11" name="password1">
                                    <p id="ero6" style='color:red; margin-bottom: -15px; margin-top: 5px'></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Xác nhận mật khẩu mới</label>
                                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" id="mKhau22" name="password2">
                                    <p id="ero7" style='color:red; margin-bottom: -15px; margin-top: 5px'></p>
                                </div>
                            </div>
                            
                            <div class="col-md-8 col-md-offset-2">
                                <button type="button" id="saveTT1" class="btn btn-primary btn-block" >Lưu lại</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
                <!-- /Modal content -->
            </div>
        </div>
        <!-- /Modal Profile-->
       
        <div id="page-wrapper">

            @yield('noidung')

        </div>


    </div>
     <!--#wrapper -->







    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script>
        //ckeditor
        CKEDITOR.replace( 'editor1' );
        //inputfile
        $("#input-id").fileinput();
    </script>    
    <!-- fileinput plugins -->
    <script src="{{ asset('public/js/fileinput.js') }}"></script>
   
    
</body>
</html>