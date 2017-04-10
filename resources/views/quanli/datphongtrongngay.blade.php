@extends('qldatphong_home')

@section('title', 'Lượt Đặt Trong Ngày')

@section('table')

<script type="text/javascript">
    //Bắt sự kiện khi bấm button chỉnh sửa
    $(document).ready(function(){
        $(".btnChinhSua").click(function(){
            var url = "http://localhost/nienluan-ktpm/quanli/chinhsuadatphong"
            var mact = $(this).closest('tr').find('td:first').text();
            //alert(mact) ;
           
           $.ajax({
                url : url,
                type : "GET",
                dataType : "JSON",
                data : {'mact':mact},
                success : function(result){
                    if(result.success){
                        location = "http://localhost/nienluan-ktpm/quanli/qldatphong/chitietdatphong";
                    }
                }
           });    
        });
    });
</script>

    <h2>Lượt Đặt Phòng Trong Ngày</h2> 
    <div class="table-responsive text-center">
        <table class="table table-hover table-bordered" id="tbLuotDatPhong">
            <thead>
                <tr>
                    <th>Mã ĐP</th>
                    <th>Tên khách hàng</th>
                    <th>SĐT</th>
                    <th>Người lớn</th>
                    <th>Trẻ em</th>
                    <th>Loại phòng</th>
                    <th>Phòng</th>
                    <th>Ngày đặt</th>
                    <th>Ngày nhận</th>
                    <th>Ngày trả</th>
                    <th>Xác nhận</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($num_day == 0)
                    <tr>
                        <td align="center" colspan="11" style="color: red"><h4>Không có lượt đặt phòng trong ngày !</h4></td>
                    </tr>
                @else
                    @foreach($datphongtrongngay as $key => $val)
                        @if(date('d',strtotime($val->ngayden)) == $today 
                            && date('m',strtotime($val->ngayden)) == $month_cur 
                            && date('Y',strtotime($val->ngayden)) == $year)
                            <tr>
                                <td>{{ $val->mact }}</td>
                                <td>{{ $val->tenkh }}</td>
                                <td>{{ $val->sdt }}</td>
                                <td>{{ $val->songuoilon }}</td>
                                <td>{{ $val->sotreem }}</td>
                                <td>
                                    <?php
                                        $tenlp = DB::table('loai_phong')->where('malp',$val->malp)->first();
                                        echo $tenlp->tenlp;
                                    ?>
                                </td>
                                <td>
                                <?php
                                    $laytenphong = DB::table('datphong')
                                    ->join('chitiet_datphong','chitiet_datphong.mact','=','datphong.mact')
                                    ->where('datphong.mact',$val->mact)
                                    ->get();
                                    foreach ($laytenphong as $key => $val1) {
                                        $ten = DB::table('phong')->where('maphong',$val1->maphong)->first();
                                        echo $ten->tenphong.', ';
                                    }
                                ?>
                                </td>
                                <td>{{ date('d-m-Y',strtotime($val->ngaydat)) }}</td>
                                <td>{{ date('d-m-Y',strtotime($val->ngayden)) }}</td>
                                <td>{{ date('d-m-Y',strtotime($val->ngaydi)) }}</td>
                                @if($val->xacnhan == 0)
                                    <td>
                                        <i class="fa fa-close" style="color:red"></i>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btnChinhSua">Chi tiết</button>
                                    </td>
                                @elseif($val->xacnhan == 1)
                                    <td>
                                        <i class="fa fa-check" style="color:green"></i> 
                                    </td>
                                    <td>
                                        <button class="btn btn-info btnChinhSua">Chi tiết</button>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>
             
            </table>
        </div>
@stop