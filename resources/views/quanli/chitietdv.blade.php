@extends('quanli_home')

@section('active_qldv','active')

@section('noidung')
<style type="text/css">
	.anhht {width: 100px; height: 100px; margin-right: 10px;}
	.icon-del {position: relative; top: -45px; left:-20px;}
</style>

<!--Xóa  từng ảnh khi bấm dấu x -->
<script type="text/javascript">
	$(document).ready(function(){
        $('a#delImg').on('click',function(){
            var url = "http://localhost/nienluan-ktpm/quanli/qldichvu/xoaanhdv/";
            //Tìm trong form có tên formChiTietDV và tìm trong thẻ input có name = _token
            var _token = $("form[name='formChiTietDV']").find("input[name='_token']").val();
            //Chỗ hiện tại là con nút x, kiếm lên parent là thẻ img tìm img lấy id hình
            var idHinh = $(this).parent().find("img").attr("id");
            //Chỗ hiện tại là con nút x, kiếm lên parent là thẻ img tìm img lấy src
            var duongdan = $(this).parent().find("img").attr("src");
            //alert(idHinh);

            $.ajax({
                url : url + idHinh,
                type : 'get',
                cache : false,
                data :  {"_token":_token, "idHinh":idHinh, "urlHinh":duongdan},
                success : function(result){
                    if(result.success){
                        $("#"+idHinh).remove();
                    }
                }
            });
        });
    });

    //Thêm cái choose file khi bấm button
    $(document).ready(function() {
        $('#addImg').click(function(){
            $('#insert').append('<div class="row container-fluid"><input type="file" name="imgAnh[]" style="margin-bottom: 5px"></div>');
        });
    });

    //Xóa dịch vụ
    $(document).ready(function(){
        $("#delDV").click(function(){
            var url = "http://localhost/nienluan-ktpm/quanli/qldichvu/xoadv";
            var _token = $("form[name='formChiTietDV']").find("input[name='_token']").val();
            var madv = $("form[name='formChiTietDV']").find("input#id_madv").val();
            //alert(madv);

            $.ajax({
                url : url,
                type : 'get',
                cache : false,
                data : {"_token":_token, "madv":madv},
                success : function(result){
                    if(result.success){
                        alert('Xóa thành công');
                        //Chuyển hướng về trang qldichvu
                        location="http://localhost/nienluan-ktpm/quanli/qldichvu";
                    }
                }   
            });
        });
    });
</script>



<form action="{{action('qlDichVuController@luuCapNhat')}}" method="POST" name="formChiTietDV" enctype="multipart/form-data">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Chi Tiết Dịch Vụ
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-glass"></i> <a href="{{ asset('quanli/qldichvu') }}">Quản Lí Dịch Vụ</a>
                            </li>
                            <li class="active">
                                 Chi Tiết Dịch Vụ
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-3">
                        <label>Mã dịch vụ</label>
                        <input type="text" id="id_madv" class="form-control" value="{{ $dv->madv }}" name="txtMaDV" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Tiêu Đề</label>
                        <input type="text" class="form-control" placeholder="Nhập tiêu đề" value="{{ $dv->tendv }}" name="txtTieuDe">
                        <p style='color:red;'>{{$errors->first('txtTieuDe')}}</p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="form-group col-lg-8">
                        <label>Mô Tả</label>
                        <br>
                        <textarea name="txtMoTa" rows="5" placeholder=" Nhập mô tả" class="form-control">{!! $dv->mota !!}</textarea>
                        <p style='color:red;'>{{$errors->first('txtMoTa')}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label>Nội Dung</label>
                        <textarea name="txtNoiDungDV" id="editor1" rows="10" cols="80">{!! $dv->noidungdv !!}</textarea>
                        <p id="ero11" style='color:red; margin-bottom: -15px; margin-top: 5px'></p>
                    </div>
                        <p style='color:red;'>{{$errors->first('txtNoiDungDV')}}</p>
                </div>

                <!-- Hiển thị hình ảnh từ CSDL-->
                <div class="row container-fluid">
                	<p><b>Hình ảnh hiện tại</p>
                	<div>
                        <img src="{{ asset('public/dichvu/'.$dv->anhdv) }}" alt="ảnh" class="anhht">
		                	@foreach($img as $key => $val)
                                <p style="float: left; margin-bottom: -10px" id="{!! $val->id !!}">
    		                		<img src="{{ asset('public/dichvu/'.$val->tenanh) }}" alt="ảnh" class="anhht" id="{!! $val->id !!}" idAnh="img_cr">
    		                		<a type="button" id="delImg" class="btn-danger btn-circle icon-del"><i class="fa fa-times"></i></a>
                                </p>
		                	@endforeach
					</div>
                </div>

                <br>
                <div class="row container-fluid">
                    <label>Thay đổi ảnh chính</label>
                    <input type="file" name="imgChinh" style="margin-bottom: 5px">
                </div>

                <!-- Thêm nhiều ảnh -->
                <div class="row container-fluid">
                    <label>Thêm ảnh phụ</label>
                    <input type="file" name="imgAnh[]" style="margin-bottom: 5px">
                    <div id="insert"></div>
                    <br>
                    <button type="button" id="addImg" class="btn btn-primary btn-lg">Thêm hình ảnh</button>
                </div>

                <div class="row">
                    <div class="col-lg-1 col-lg-offset-8">
                        <button type="button" id="delDV" class="btn btn-danger btn-lg">Xóa</button> 
                    </div>

                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Lưu lại</button>
                    </div>
                </div>
     				
			</div> <!-- /container-fluid -->
</form>
			

@stop