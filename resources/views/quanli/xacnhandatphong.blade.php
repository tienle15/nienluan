@extends('quanli_home')

@section('active_qldap','active')

@section('noidung')

<script type="text/javascript">
    //Bắt sự kiện khi bấm button Xóa
    $(document).ready(function(){
        $(".btnXoa").click(function(){
            var url = 'http://localhost/nienluan-ktpm/quanli/xoadatphong';
            var mact = $(this).closest('tr').find('td:first').text();
            //alert(mact);

            $.ajax({
                url : url,
                type : "GET",
                dataType : "JSON",
                data : {'mact':mact},
                success : function(result){
                    if(result.success){
                        alert('Đã xóa lượt đặt phòng của khách hàng : ' + result.tenkh);
                        location = "http://localhost/nienluan-ktpm/quanli/qldatphong/xacnhan";
                    }
                }
            });
        });
    });

    //Bắt sự kiện khi bấm button Xác nhận
    $(document).ready(function(){
        $(".btnXacNhan").click(function(){
            var url = 'http://localhost/nienluan-ktpm/quanli/luuxacnhandatphong';
            var mact = $(this).closest('tr').find('td:first').text();
            //alert(mact);

            $.ajax({
                url : url,
                type : "GET",
                dataType : "JSON",
                data : {'mact':mact},
                success : function(result){
                    if(result.success){
                        alert('Đã xác nhận lượt đặt phòng của khách hàng : ' + result.tenkh);
                        location = "http://localhost/nienluan-ktpm/quanli/qldatphong/xacnhan";
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
                            Xác Nhận Đặt Phòng
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ asset('quanli/qldatphong') }}"><i class="fa fa-calendar"></i> Quản Lí Đặt Phòng</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-calendar"></i> Xác Nhận Đặt Phòng
                            </li>
                        </ol>
                    </div>
                </div>
              

                <!-- table -->
                <div>
                    <h2>Lượt Đặt Phòng Chưa Xác Nhận</h2> 
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr >
                                    <th>Mã ĐP</th>
                                    <th>Tên khách hàng</th>
                                    <th>SDT</th>
                                    <th>Loại phòng</th>
                                    <th>Ngày đặt</th>
                                    <th>Ngày nhận</th>
                                    <th>Ngày trả</th>
                                    <th>Xác nhận</th>
                                    <th  class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($num_chuaxacnhan == 0)
                                    <tr>
                                        <td align="center" colspan="10" style="color: red"><h4>Không có lượt đặt phòng mới !</h4></td>
                                    </tr>
                                @else
                                    @foreach($ds_datphongmoi as $key => $val)
                                        <tr>
                                            <td>{{ $val->mact }}</td>
                                            <td>{{ $val->tenkh }}</td>
                                            <td>{{ $val->sdt }}</td>
                                            <td>
                                                <?php
                                                    $tenlp = DB::table('loai_phong')->where('malp',$val->malp)->first();
                                                    echo $tenlp->tenlp;
                                                ?>
                                            </td>
                                            <td>{{ date('d-m-Y',strtotime($val->ngaydat)) }}</td>
                                            <td>{{ date('d-m-Y',strtotime($val->ngayden)) }}</td>
                                            <td>{{ date('d-m-Y',strtotime($val->ngaydi)) }}</td>
                                            <td><i class="fa fa-close" style="color:red"></i></td>
                                            <td>
                                                <button class="btn btn-success btnXacNhan">Xác nhận</button>
                                                <button class="btn btn-danger btnXoa">Xóa</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center" colspan="10">{!! $ds_datphongmoi->render() !!}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
    </div>
@stop