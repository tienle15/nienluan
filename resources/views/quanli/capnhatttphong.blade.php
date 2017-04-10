@extends('quanli_home')

@section('active_qlp','active')

@section('noidung')

<script type="text/javascript">
    //Bắt sự kiện khi bấm button cập nhật
    $(document).ready(function(){
        $(".btncapNhat").click(function(){
            var url = "http://localhost/nienluan-ktpm/quanli/qlphong/luucapnhatttphong";
            //var _token = $("form[name='form_DSP']").find("input[name='_token']").val();
            //Tại vị trí btt  chọn tr đầu tiên tìm cái ô (td) ở cột thứ 2 lấy giá trị
            var maphong = $(this).closest('tr').find('td:nth-child(2)').text();
            var tenphong = $(this).closest('tr').find("input[name='nameroom']").val();
            //Lấy giá trị trong option (mã loại phòng)
            //var loaiphong = $(this).closest('tr').find("select#LP").val();
            //Lấy tình trạng phòng giá trị 0, 1,2
            var tinhtrang = $(this).closest('tr').find("select#TT").val();
            //alert(tinhtrang);

            $.ajax({
                url : url,
                type : "GET",
                dataType : "JSON",
                data : {"maphong":maphong, "tenphong":tenphong, "tinhtrang":tinhtrang},
                success : function(result){
                    if(!result.success){
                        var ht = '';
                        $.each(result.errors,function(index, item){
                            ht = item;
                        });
                        //$("#erTenPhong").html(ht);
                        alert(ht);
                    }else{
                        alert('Cập nhật thành công phòng');
                        //Chuyển hướng về trang 
                        location = "http://localhost/nienluan-ktpm/quanli/qlphong/capnhatttphong";
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
                            Cập Nhật Tình Trạng Phòng
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{asset('quanli/qlphong')}}">
                                <i class="glyphicon glyphicon-lamp"></i> Quản Lí Phòng
                                </a>
                            </li>
                            <li class="active">
                                 Cập Nhật Tình Trạng Phòng
                            </li>
                        </ol>
                    </div>
                </div>
                <div >
                    <h2>Danh Sách Phòng</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã phòng</th>
                                        <th>Tên loại phòng</th>
                                        <th>Tên phòng</th>                  
                                        <th>Tình trạng hiện tại</th>    
                                        <th>Thao Tác</th>                               
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($row == 0)
                                        <tr>
                                            <td align="center" colspan="6" style="color: red"><h4>Chưa có dữ liệu !</h4></td>
                                        </tr>
                                    @else
                                        <?php $stt=0; ?>
                                        @foreach($dsphong as $key => $val)
                                            <?php $stt++;?>
                                            <tr>
                                                <td>
                                                    <?php 
                                                        if(isset($_GET['page'])){
                                                            $i = 8*($_GET['page']-1);
                                                            echo $stt+$i;
                                                        }else
                                                            echo $stt; 
                                                    ?>
                                                </td>
                                                <td id="MP">{{$val->maphong}}</td>
                                                <td>
                                                    <?php
                                                        $tenlp = DB::table('loai_phong')->where('malp',$val->malp)->first();
                                                        echo $tenlp->tenlp;
                                                    ?>   
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="nameroom" value="{{$val->tenphong}}" id="TP" style="width: 150px;">
                                                <!--    <div id="erTenPhong" style='color:red; margin-bottom: -15px; margin-top: 5px'></div>  -->
                                                </td>
                                                <td>
                                                    <select id="TT" class="form-control" style="width: 150px">
                                                        @if($val->tinhtrang==0)
                                                            <option value="0" selected>Trống</option>
                                                            <option value="1">Có Khách</option>
                                                            <option value="2">Sửa Chữa</option>
                                                        @elseif ($val->tinhtrang==1)
                                                            <option value="0">Trống</option>
                                                            <option value="1" selected>Có Khách</option>
                                                            <option value="2">Sửa Chữa</option>
                                                        @elseif ($val->tinhtrang==2)
                                                            <option value="0">Trống</option>
                                                            <option value="1">Có Khách</option>
                                                            <option value="2" selected>Sửa Chữa</option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btncapNhat" id="btncapNhat">
                                                    <i class="fa fa-refresh"></i>Cập nhật
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td align="center" colspan="6">{!! $dsphong->render() !!}</td>
                                    </tr>
                                </tfoot>
                            </table>
                    </div> <!-- /table -->
                </div>
</div>
@stop