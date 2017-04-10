@extends('quanli_home')

@section('active_qldp','active')

@section('noidung')
<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Chi Tiết Đặt Phòng
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{asset('quanli/qldatphong')}}">
                                <i class="fa fa-calendar"></i> Quản Lí Đặt Phòng
                                </a>
                            </li>
                            <li class="active">
                                 Chi Tiết Đặt Phòng
                            </li>
                        </ol>
                    </div>
                </div>

            <form name="" action="{{action('qlDatPhongController@luuChiTietDP')}}" method="post"> 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="table table-striped container-fluid">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>Mã Đặt Phòng</label>
                            <input name="txtMaCT" type="text" class="form-control" value="{{ $chitiet->mact }}" readonly="">
                        </div>
                        <div class="form-group col-md-2 col-md-offset-2">
                            <label>Mã Khách Hàng</label>
                            <input name="txtMaKH" type="text" class="form-control" value="{{ $chitiet->makh }}" readonly="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Tên Khách Hàng</label>
                            <input name="txtTenKH" type="text" class="form-control" value="{{ $chitiet->tenkh }}">
                        </div>
                        <div class="col-md-3 col-md-offset-1 form-group">
                            <label>Số Điện Thoại</label>
                            <input name="txtSDT" type="text" class="form-control" value="{{ $chitiet->sdt }}">
                        </div>
                        <div class="col-md-3 col-md-offset-1 form-group">
                            <label>Email</label>
                            <input name="txtEmail" type="text" class="form-control" value="{{ $chitiet->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 form-group ">   
                            <label>Ngày Nhận</label>             
                            <div class="input-group date">
                                <input name="txtNgayNhan" id="txtngayBD1" class="form-control" type="text" readonly="" value="{{ date('d-m-Y',strtotime($chitiet->ngayden)) }}" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                            </div>
                        </div>
                        <div class="col-md-2  form-group ">   
                            <label>Ngày Trả</label>             
                            <div class="input-group date">
                                <input name="txtNgayTra" id="txtngayKT1" class="form-control" type="text" readonly="" value="{{ date('d-m-Y',strtotime($chitiet->ngaydi)) }}" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                            </div>
                        </div> 
                        <div class="col-md-2 form-group">
                            <label>Số Người Lớn</label>
                            <input type="text" name="cboNgLon" id="cboNgLon" class="form-control" value="{{$chitiet->songuoilon}}" readonly="">
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Số Trẻ Em</label>
                            <input type="text" name="cboTreEm" id="cboTreEm" class="form-control" value="{{$chitiet->sotreem}}" readonly="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Loại Phòng</label>
                            <?php
                                $tenlp = DB::table('loai_phong')->select('tenlp')->where('malp',$chitiet->malp)->first();
                            ?>
                            <input type="text" name="cboLP" id="cboLP" class="form-control" value="{{$tenlp->tenlp}}" readonly="">
                            
                        </div>
                        <div class="col-md-5 col-md-offset-1 form-group">
                            <label>Phòng</label>
                            <input type="text" name="txtTenPhong"  class="form-control" value="<?php 
                                                        foreach ($ds_tenphong as $key => $val) {
                                                            $ten = DB::table('phong')->where('maphong',$val->maphong)->first();
                                                            echo $ten->tenphong.', ';
                                                        }
                                                        ?>" readonly="">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pull-right">                
                    <button type="submit" class="btn btn-primary btn-lg btn-block ">Lưu lại</button>                   
                </div>
            </form>   


</div>
@stop