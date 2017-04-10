@extends('quanli_home')

@section('active_km','active')

@section('noidung')
<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Thêm Khuyến Mãi Mới
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-gift"></i> <a href="{{ asset('quanli/khuyenmai') }}"> Khuyến Mãi</a>
                            </li>
                            <li class="active">
                                 Thêm Khuyến Mãi Mới
                            </li>
                        </ol>
                    </div>
                </div>

                <form name="addKM" action="{{ action('khuyenMaiController@luuKM') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">

                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label>Tiêu Đề</label>
                            <input type="text" class="form-control" placeholder="Nhập tiêu đề"
                            name="txtTieuDe" value="{{ old('txtTieuDe') }}">
                            <p style='color:red; margin-bottom: -15px; margin-top: 5px'>{{$errors->first('txtTieuDe')}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Ngày Bắt Đầu</label>
                            <div class="input-group date">              
                                <input id="txtngayBD" class="form-control" type="text" readonly name="txtngayBD" value="{{ old('txtngayBD') }}"/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                            </div>
                            <p style='color:red; margin-bottom: -15px; margin-top: 5px'>{{$errors->first('txtngayBD')}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Ngày Kết Thúc</label>
                            <div class="input-group date">              
                                <input id="txtngayKT" class="form-control" type="text" readonly name="txtngayKT" value="{{ old('txtngayKT') }}"/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
                            </div>
                            <p style='color:red;margin-bottom: -15px; margin-top: 5px'>{{$errors->first('txtngayKT')}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-2">
                            <label>Chiết Khấu(%)</label>
                            <input type="number" class="form-control" min="0" max="100" name="txtChietKhau" value="{{ old('txtChietKhau') }}">
                            <p style='color:red;margin-bottom: -15px; margin-top: 5px'>{{$errors->first('txtChietKhau')}}</p>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Mô Tả</label>
                            <br>
                            <textarea name="txtMoTa" id="" cols="110" rows="5" placeholder="Nhập mô tả">{!! old('txtMoTa') !!}</textarea>
                            <p style='color:red;'>{{$errors->first('txtMoTa')}}</p>
                        </div>
                    </div>  

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Áp dụng cho:</label>
                            <br>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="txtLoaiPhong[]" value="LP001">Phòng Standard
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="txtLoaiPhong[]" value="LP002">Phòng Superior
                                </label>                        
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="txtLoaiPhong[]" value="LP003">Phòng Deluxe
                                </label>                       
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="txtLoaiPhong[]" value="LP004">Phòng Premium-Villa
                                </label>   
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="txtLoaiPhong[]" value="LP005">Phòng Junior-Villa
                                </label>                   
                        </div>
                        <p style='color:red; margin-left: 15px'>{{$errors->first('txtLoaiPhong')}}</p>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Nội Dung</label>
                            <textarea name="txtNoiDung" id="editor1" rows="10" cols="80"></textarea>
                            <p style='color:red; margin-bottom: -15px; margin-top: 5px'>{{$errors->first('txtNoiDung')}}</p>
                        </div>
                    </div>
                    <div class="row container-fluid">
                        <label>Chọn ảnh :</label>
                        <input type="file" name="imgKM" style="margin-bottom: 5px">
                        <p style='color:red; margin-bottom: -15px; margin-top: 5px'>{{$errors->first('imgKM')}}</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-1 col-lg-offset-8">
                            <a href="{{ asset('quanli/khuyenmai') }}" class="btn btn-default btn-lg ">Hủy</a>
                        </div>
                    
                        <div class="col-lg-3 ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng Tin</button>
                        </div>
                    </div>
                </form>
                    
</div>
@stop