@extends('qldatphong_home')


@section('table')
    <h2>Lượt Đặt Phòng Mới</h2> 
    <div class="table-responsive">
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
                </tr>
            </thead>
            <tbody>
                @if($num_chuaxacnhan == 0)
                    <tr>
                        <td align="center" colspan="11" style="color: red"><h4>Không có lượt đặt phòng mới !</h4></td>
                    </tr>
                @else
                    @foreach($ds_datphongmoi as $key => $val)
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
                            <td><i class="fa fa-close" style="color:red"></i></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td align="center" colspan="11">{!! $ds_datphongmoi->render() !!}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
@stop