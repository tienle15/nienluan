<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;


class qlDatPhongController extends Controller
{
    public function qldatphong(){
        //LƯỢT ĐẶT PHÒNG MỚI
    	$ds_datphongmoi = DB::table('datphong')
    						->join('khach_hang','khach_hang.makh','=', 'datphong.makh')
    						->where('datphong.xacnhan',0)
                            ->paginate(10); //Phân trang
        $num_chuaxacnhan = DB::table('datphong')->where('xacnhan',0)->count('mact');
        
        return view('quanli.qldatphong')->with('ds_datphongmoi',$ds_datphongmoi)->with('num_chuaxacnhan',$num_chuaxacnhan);
    }   

    //Xác nhận đặt phòng
    public function xacNhan(){
    	//LƯỢT ĐẶT PHÒNG MỚI
        $ds_datphongmoi = DB::table('datphong')
                            ->join('khach_hang','khach_hang.makh','=', 'datphong.makh')
                            ->where('datphong.xacnhan',0)
                            ->paginate(10); //Phân trang
        //ĐẾM SỐ LƯƠT PHÒNG CHƯA XÁC NHẬN
        $num_chuaxacnhan = DB::table('datphong')
                            ->join('khach_hang','khach_hang.makh','=', 'datphong.makh')
                            ->where('datphong.xacnhan',0)->count('mact');

        return view('quanli.xacnhandatphong')->with('ds_datphongmoi',$ds_datphongmoi)->with('num_chuaxacnhan',$num_chuaxacnhan);
    }

    //Tất cả lượt đặt phòng
    public function tatCaLuotDP(){
        //TẤT CẢ LƯỢT ĐẶT PHÒNG
        $ds_tatcaluotdatphong = DB::table('datphong')
                            ->join('khach_hang','khach_hang.makh','=', 'datphong.makh')
                            ->paginate(10); //Phân trang
        $num_all = DB::table('datphong')->count('mact');

        return view('quanli.tatcaluotdatphong')->with('tatcaluotdatphong',$ds_tatcaluotdatphong)->with('num_all',$num_all);
    }

    //Đặt phòng trong tháng
    public function datPhongTrongThang(){
        //TẤT CẢ LƯỢT ĐẶT PHÒNG
        $ds_datphongtrongthang = DB::table('datphong')
                            ->join('khach_hang','khach_hang.makh','=', 'datphong.makh')
                            //->paginate(10); //Phân trang
                            ->get();
        $month_cur = date('m'); //lấy tháng hiện tại
        $year = date('Y'); //lấy năm hiện tại

        $ds_tatcaluotdatphong = DB::table('datphong')->get();

        //ĐẾM LƯỢT ĐẶT PHÒNG TRONG THÁNG
        $num_month = 0;
        foreach ($ds_tatcaluotdatphong as $key => $val) {
            if(date('m',strtotime($val->ngayden)) == $month_cur && date('Y',strtotime($val->ngayden)) == $year){
                $num_month++;
            }
        }

        return view('quanli.datphongtrongthang')->with('datphongtrongthang',$ds_datphongtrongthang)->with('num_month',$num_month)->with('month_cur',$month_cur)->with('year',$year);
    }

    //Đặt phòng trong ngày
    public function datPhongTrongNgay(){
        //TẤT CẢ LƯỢT ĐẶT PHÒNG
        $ds_datphongtrongngay = DB::table('datphong')
                            ->join('khach_hang','khach_hang.makh','=', 'datphong.makh')
                            //->paginate(10); //Phân trang
                            ->get();
        $today = date('d'); //lấy ngày hiện tại
        $month_cur = date('m'); //lấy tháng hiện tại
        $year = date('Y'); //lấy năm hiện tại

        $ds_tatcaluotdatphong = DB::table('datphong')->get();

        //ĐẾM LƯỢT ĐẶT PHÒNG TRONG NGÀY
        $num_day = 0;
        foreach ($ds_tatcaluotdatphong as $key => $val) {
            if(date('d',strtotime($val->ngayden)) == $today 
                && date('m',strtotime($val->ngayden)) == $month_cur 
                && date('Y',strtotime($val->ngayden)) == $year){
                $num_day++;
            }
        }

        return view('quanli.datphongtrongngay')->with('datphongtrongngay',$ds_datphongtrongngay)->with('num_day',$num_day)->with('today',$today)->with('month_cur',$month_cur)->with('year',$year);
    }


    //Chi tiết đặt phòng
    public function chiTietDatPhong(){
        //LẤY CÁI MÃ TỪ SESSION KHI ẤN BUTTON CHỈNH SỬA
        session_start();
        $mact = $_SESSION['mact'];

        $chitietdatphong = DB::table('datphong')
                            ->join('khach_hang','khach_hang.makh','=', 'datphong.makh')
                            ->where('datphong.mact',$mact)
                            ->first();
        $ds_tenphong = DB::table('datphong')
                            ->join('chitiet_datphong','chitiet_datphong.mact','=','datphong.mact')
                            ->where('datphong.mact',$mact)
                            ->get();

        return view('quanli.chitietdatphong')->with('chitiet',$chitietdatphong)->with('ds_tenphong',$ds_tenphong);
    }

    //Lưu chi tiết đặt phòng
    public function luuChiTietDP(Request $request){
        $mact = $request->txtMaCT;
        $makh = $request->txtMaKH;
        $tenkh = $request->txtTenKH;
        $sdt = $request->txtSDT;
        $email = $request->txtEmail;
        //$ngayden = date('Y-m-d',strtotime($request->txtNgayNhan));
        //$ngaydi = date('Y-m-d',strtotime($request->txtNgayTra));
        //$nguoilon = $request->cboNgLon;
        //$treem = $request->cboTreEm;
        //$malp = $request->cboLP;
        $maql = Auth::user()->maql;

        //Cập nhật trong bảng datphong
        DB::table('datphong')->where('mact',$mact)->update([
            'maql'=>$maql
        ]);
        //Cập nhật bảng khach_hang
        DB::table('khach_hang')->where('makh',$mackh)->update([
            'tenkh'=>$tenkh,
            'email'=>$email,
            'sdt'=>$sdt
        ]);

        return redirect('quanli/qldatphong');
    }
}
