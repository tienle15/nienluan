@extends('quanli_home')

@section('active_qldv','active')

@section('noidung')
<script type="text/javascript">
    $(document).ready(function() {
        $('#addImg').click(function(){
            $('#insert').append('<div class="row container-fluid"><input type="file" name="imgAnh[]" style="margin-bottom: 5px"></div>');
        });
    });

</script>


<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Thêm Dịch Vụ Mới
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-glass"></i> <a href="{{ asset('quanli/qldichvu')}}">Quản Lí Dịch Vụ</a>
                            </li>
                            <li class="active">
                                 Thêm Dịch Vụ Mới
                            </li>
                        </ol>
                    </div>
                </div>

                <form name="addDV" action="{{action('qlDichVuController@luuDV')}}" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Tiêu Đề</label>
                            <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="txtTieuDe" value="{{ old('txtTieuDe')}}">
                            <p style='color:red;'>{{$errors->first('txtTieuDe')}}</p>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Mô Tả</label>
                            <br>
                            <textarea name="txtMoTa" id="" cols="72" rows="5" placeholder="Nhập mô tả">{!! old('txtMoTa') !!}</textarea>
                            <p style='color:red;'>{{$errors->first('txtMoTa')}}</p>
                        </div>
                    </div>    

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Nội Dung</label>
                            <textarea name="txtNoiDung" id="editor1" rows="10" cols="80">
                                {!! old('txtNoiDung') !!}
                            </textarea>  
                            <p style='color:red;'>{{$errors->first('txtNoiDung')}}</p>
                        </div>
                    </div>           


                    <div class="row container-fluid">
                        <label>Chọn ảnh chính :</label>
                        <input type="file" name="imgChinh" style="margin-bottom: 5px">
                        <p style='color:red;'>{{$errors->first('imgChinh')}}</p>
                    </div>

                    <!-- Thêm nhiều ảnh -->
                    <div class="row container-fluid">
                        <label>Chọn ảnh phụ:</label>
                        <input type="file" name="imgAnh[]" style="margin-bottom: 5px">
                        <p style='color:red;'>{{$errors->first('imgAnh')}}</p>
                        <div id="insert"></div>
                        <br>
                        <button type="button" id="addImg" class="btn btn-primary btn-lg">Thêm hình ảnh</button>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-lg-1 col-lg-offset-8">
                            <a href="{{ asset('quanli/qldichvu') }}">
                                <button type="button" class="btn btn-default btn-lg">Hủy</button>
                            </a>
                        </div>

                        <div class="col-lg-3">
                            <a href="#">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Lưu lại</button>
                            </a>
                        </div>
                    </div>
                </form>
                    
            </div> <!-- /container-fluid -->
@stop

 