@extends('quanli_home')

<!-- Gọi section này để bật active cho thanh menu bên trái in đậm -->
@section('active_qlp','active')

@section('noidung')

<script type="text/javascript">
    $(document).ready(function(){
        $("#saveThem").click(function(){
            //Lấy thông tin truyền qua ajax
            var url = "http://localhost/nienluan-ktpm/quanli/themphong";
            var tenphong = $("#tenPhong").val();
            var malp = $("#cbLoaiPhong").val();
            //alert(malp);

            $.ajax({
                url : url,
                type : "GET",
                typeData : "JSON",
                data : {"tenphong":tenphong, "malp":malp},
                success : function(result){
                    if(!result.success){
                        var html14 = '';
                        var html15 = '';
                        $.each(result.errors, function(index, item){
                            if(index == 'tenphong')
                                html14 = item;
                            if(index == 'malp')
                                html15 = item;
                        });
                        $("#ero14").html(html14);
                        $("#ero15").html(html15);
                    }else{
                        $("#myModal").modal('hide');
                        alert('Thêm thành công');
                        location.reload(true);
                    }
                }
            });
        });
    });
</script>



<div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quản Lí Phòng
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="glyphicon glyphicon-lamp"></i> Quản Lí Phòng
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        
                        <button class="btn btn-success btn-lg" type="button" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus-circle"></i> Phòng mới 
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-sm">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header ">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" align="center">Thêm Phòng Mới</h4>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Tên Phòng</label>
                                                <input type="text" class="form-control" placeholder="Nhập tên phòng" id="tenPhong" name="tenphong">
                                                <p id="ero14" style='color:red; margin-bottom: -15px; margin-top: 5px'></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Loại Phòng</label>
                                                <select name="malp" id="cbLoaiPhong" class="form-control">
                                                    <option value="">[Chọn loại phòng]</option>
                                                    @foreach($lp as $key => $val)
                                                        @if(!empty($val))
                                                            <option value="{{ $val->malp }}">Phòng {{ $val->tenlp }}</option>
                                                        @endif
                                                    @endforeach     
                                                </select>
                                                <p id="ero15" style='color:red; margin-bottom: -15px; margin-top: 5px'></p>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-md-offset-2">
                                            <button type="button" id="saveThem" class="btn btn-primary btn-block">Lưu lại</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div> <!-- /Modal content -->
                        </div> <!-- /Modal -->
                    </div>
                    <div class="col-lg-3">
                        <a href="{{asset('quanli/qlphong/capnhatttphong')}}">
                            <button class="btn btn-primary btn-lg"><i class="fa fa-refresh"></i> Cập nhật tình trạng phòng</button>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div>
                    <h2>Danh Sách Phòng</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tableDSP">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã phòng</th>
                                    <th>Tên loại Phòng</th>
                                    <th>Tên phòng</th>                                   
                                    <th>Tình trạng hiện tại</th>                  
                                </tr>
                            </thead>
                            <tbody>
                            @if($row == 0)
                                <tr >
                                    <td align="center" colspan="5" style="color: red"><h4>Chưa có dữ liệu !</h4></td>
                                </tr>
                            @else
                                <?php $stt=0; ?>
                                @foreach($phong as $key => $val)
                                    <?php $stt++; ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                if(isset($_GET['page'])){
                                                    $i = 10*($_GET['page']-1);
                                                    echo $stt+$i;
                                                }else
                                                    echo $stt; 
                                            ?>
                                        </td>
                                        <td>{!! $val->maphong !!}</td>
                                        <td>
                                            <?php 
                                                $ten =DB::table('loai_phong')->select('tenlp')->where('malp',$val->malp)->first();
                                                echo $ten->tenlp;
                                             ?>

                                        </td>
                                        <td>{{ $val->tenphong }}</td>
                                        @if($val->tinhtrang==0)
                                            <td style="color: green"><i class="glyphicon glyphicon-ok"></i> Trống</td>
                                        @elseif($val->tinhtrang==1)
                                            <td style="color: blue"><i class="glyphicon glyphicon-user" ></i> Có Khách</td>
                                        @elseif ($val->tinhtrang == 2)
                                            <td style="color: red"><i class="glyphicon glyphicon-wrench"></i> Sửa Chữa</td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center" colspan="5">{!! $phong->render() !!}</td>
                                </tr>
                            </tfoot>
                        </table>
                </div>
</div>

@stop
