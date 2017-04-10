@extends('quanli_home')

<!-- Gọi section này để bật active cho thanh menu bên trái in đậm -->
@section('active_qldp','active')

@section('noidung')

<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quản Lí Đặt Phòng
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ asset('quanli/qldatphong') }}"><i class="fa fa-calendar"></i> Quản Lí Đặt Phòng</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-calendar"></i> @yield('title')
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- Panel -->
                <div class="row">
                    <!-- Panel Confirm -->
                    <div class="col-md-6 col-lg-3">                       
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                                $num_chuaxacnhan = DB::table('datphong')->where('xacnhan',0)->count('mact');
                                                echo $num_chuaxacnhan;
                                            ?>
                                        </div>
                                        Lượt Đặt Phòng<br> Chưa Xác Nhận
                                    </div>
                                </div>
                            </div>
                            <a href="{{ asset('quanli/qldatphong/xacnhan') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">
                                        Xác nhận
                                    </span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>                           
                        </div>   
                    </div>
                    <!-- Panel New-->
                    <div class="col-md-6 col-lg-3">                       
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <?php
                                            $ds_tatcaluotdatphong = DB::table('datphong')->get();
                                            $today = date('d'); //lấy ngày hiện tại
                                            $month_cur = date('m'); //lấy tháng hiện tại
                                            $year = date('Y'); //lấy năm hiện tại

                                            //ĐẾM LƯỢT ĐẶT PHÒNG TRONG NGÀY
                                            $num_day = 0;
                                            foreach ($ds_tatcaluotdatphong as $key => $val) {
                                                if(date('d',strtotime($val->ngayden)) == $today && date('m',strtotime($val->ngayden)) == $month_cur && date('Y',strtotime($val->ngayden)) == $year){
                                                    $num_day++;
                                                }
                                            }
                                            echo $num_day;
                                        ?>
                                        </div>
                                        Lượt Đặt Phòng<br> Trong Ngày
                                    </div>
                                </div>
                            </div>
                            <a href="{{ asset('quanli/qldatphong/datphongtrongngay') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">
                                        Chi Tiết
                                    </span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>                           
                        </div>   
                    </div>
                    <!-- Panel Monthly -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        
                                        <div id="" class="huge">
                                            <?php
                                                $ds_tatcaluotdatphong = DB::table('datphong')->get();
                                                $month_cur = date('m'); //lấy tháng hiện tại
                                                $year = date('Y'); //lấy năm hiện tại

                                                //ĐẾM LƯỢT ĐẶT PHÒNG TRONG THÁNG
                                                $num_month = 0;
                                                foreach ($ds_tatcaluotdatphong as $key => $val) {
                                                    if(date('m',strtotime($val->ngayden)) == $month_cur && date('Y',strtotime($val->ngayden)) == $year){
                                                        $num_month++;
                                                    }
                                                }
                                                echo $num_month;
                                            ?>
                                        </div>
                                        Lượt Đặt Phòng<br> Trong Tháng
                                    </div>
                                </div>
                            </div>
                            <a href="{{ asset('quanli/qldatphong/datphongtrongthang') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">
                                        Chi Tiết
                                    </span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>                           
                        </div>
                    </div>
                    <!-- Panel Total  -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        
                                        <div id="" class="huge">
                                            <?php
                                                $num_all = DB::table('datphong')->count('mact');
                                                echo $num_all;
                                            ?>
                                        </div>
                                        Lượt Đặt Phòng<br> Tất Cả
                                    </div>
                                </div>
                            </div>
                            <a href="{{asset('quanli/qldatphong/tatcaluotdatphong')}}">
                                <div class="panel-footer">
                                    <span class="pull-left">
                                        Chi Tiết
                                    </span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>                           
                        </div>
                    </div>

                </div> 

                <div>
                    @yield('table')
                </div>
</div>
@stop
