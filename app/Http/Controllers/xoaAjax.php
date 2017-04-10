<?php

namespace App\Http\Controllers;

use Request;
use App\anhdv;
use App\datphong;
use File;
use Response;
use DB;
use Validator;
use Carbon\Carbon;
use App\chitietdatphong;
use App\khachhang;
use Auth;

class xoaAjax extends Controller
{
    //Xóa ảnh hiện tại
    public function xoaAnhDV($id){
    	if(Request::ajax()){
    		//Lấy id ảnh
    		$id = (int)Request::get('idHinh');
    		$ten = anhdv::find($id);
    		if(!empty($ten)){
    			//Lấy tấm ảnh ra trong thu mục
    			$img = 'public/dichvu/'.$ten->tenanh;
    			//Xóa file ảnh trong thư mục
    			if(File::exists($img)){
    				File::delete($img);
    			}
    			//Xóa ảnh trong csdl
    			$ten->delete();
    		}
    		return Response::json(['success'=>true]);
    	}
    }

    //Xóa dịch vụ
    public function xoaDV(){
        if(Request::ajax()){
            //Lấy mã dịch vụ
            $madv = Request::get('madv');
            
            //Xóa ảnh phụ trong bảng anh_dv
            $anh_list = DB::table('anh_dv')->where('madv',$madv)->get();
            if(!empty($anh_list)){
                foreach ($anh_list as $key => $val) {
                    //Xóa ảnh phụ trong thư mục
                    $duongdan = 'public/dichvu/'.$val->tenanh;
                    if(File::exists($duongdan)){
                        File::delete($duongdan);
                    }
                    //Xóa ảnh phụ trong bảng ảnh dv
                    DB::table('anh_dv')->where('id',$val->id)->delete();
                }
            }

            //Xóa ảnh chính trong thư mục
            $anhchinh = DB::table('dich_vu')->where('madv',$madv)->first();
            $duongdan = 'public/dichvu/'.$anhchinh->anhdv;
            if(File::exists($duongdan)){
                File::delete($duongdan);
            }

            //Xóa dịch vụ trong bảng dịch vụ
            DB::table('dich_vu')->where('madv',$madv)->delete();

        return Response::json(['success'=>true]);
        }
    }

    //Xóa khuyến mãi
    public function xoaKM(Request $request){
        if(Request::ajax()){
            $makm = Request::get('makm');

            //Xóa ảnh trong thư mục public/khuyenmai
            $anhkm = DB::table('khuyen_mai')->where('makm',$makm)->first();
            $duongdan = 'public/khuyenmai/'.$anhkm->anhkm;
            if(File::exists($duongdan)){
                File::delete($duongdan);
            }

            //Xóa khuyến mãi trong bảng khuyến mãi
            DB::table('khuyen_mai')->where('makm',$makm)->delete();
            //Xóa khuyến mãi trong bảng chi tiết khuyến mãi
            DB::table('chi_tiet_km')->where('makm',$makm)->delete();

            return Response::json(['success'=>true]);
        }
    }

    //Đổi panel loại phòng khi bấm combobox
    public function doiPanel(Request $request){
        if(Request::ajax()){
            $malp = Request::get('malp');

            if(!empty($malp)){
                $list_lp = DB::table('loai_phong')->where('malp',$malp)->first();

                return Response::json([
                    'success'=>true,
                    'data'=>$list_lp
                ]);
            }
        }
    }

    //Mã khách hàng tự tăng 
    public function maKH(){
        $list_makh = DB::table('khach_hang')->select('makh')->get();
        $max = 0;
        foreach ($list_makh as $value) {
            $catchuoi = substr($value->makh, 2);
            if($catchuoi > $max)
                $max = $catchuoi;
        }
        //echo '<pre>';
        //print_r($makh);
        $so = $max+1;
        if($so < 10){
            $makh = 'KH0'.$so;
        }else{
            $makh = 'KH'.$so;
        }
        return $makh;
    }

    //Mã chi tiết đặt phòng tự tăng
    public function maCT(){
        $list_mact = DB::table('datphong')->select('mact')->get();
        $max = 0;
        foreach ($list_mact as $value) {
            $catchuoi = substr($value->mact, 2);
            if($catchuoi > $max)
                $max = $catchuoi;
        }
        $so = $max + 1;
        if($so < 10){
            $mact = 'DP0'.$so;
        }else{
            $mact = 'DP'.$so;
        }
        return $mact;
    }


    //ĐẶT PHÒNG
    public function luuDatPhong(Request $request){
        if(Request::ajax()){
            $ngayDen = Request::get('ngayden');
            $ngayDi = Request::get('ngaydi');
            $nguoiLon = Request::get('nguoilon');
            $treEm = Request::get('treem');
            $hoTen = Request::get('hoten');
            $sdt = Request::get('sdt');
            $email = Request::get('email');
            $malp = Request::get('malp');

            $mact = $this->maCT();
            $makh = $this->maKH();
            $ngayDat = Carbon::now();

            $v = Validator::make(Request::all(),
                [
                    'hoten'=>'required',
                    'sdt'=>'required|between:10,11',
                    'email'=>'required|email',
                    'malp'=>'required'
                ],
                [
                    'hoten.required'=>'Họ tên không được trống',
                    'sdt.required'=>'Số điện thoại không được trống',
                    'sdt.between'=>'Số điện thoại không đúng',
                    'email.required'=>'Email không được rỗng',
                    'email.email'=>'Email không đúng định dạng',
                    'malp.required'=>'Loại phòng không được rỗng'
                ]);

            if($v->fails()){
                return Response::json([
                    'success'=>false,
                    'errors'=>$v->errors()->toArray()
                ]);
            }

            $temp_lp = DB::table('loai_phong')->where('malp',$malp)->first();   
            $sucChua = $temp_lp->succhua;

            if ( $nguoiLon % $sucChua == 0 ) {
                $soPhongCan = $nguoiLon/$sucChua ;
            }
            else // ceil là hàm làm tròn lên vd: 1.2 => 2
                $soPhongCan = ceil($nguoiLon/$sucChua);

            $soPhongTrong = 0;
            $ds_phong = DB::table('phong')->where('malp',$malp)->where('tinhtrang',0)->get();

            $dapUng = 0;
            $ds_phongTrong[] = array();
            $i=0;
            foreach ($ds_phong as $key => $phong) {
                // lấy ds đặt phòng của $phong
                $ds_datPhong = DB::table('chitiet_datphong')->where('maphong',$phong->maphong)->get();
                $trung = 0;
                foreach ($ds_datPhong as $key => $maDatPhong) {
                    $datPhong = DB::table('datphong')->where('mact',$maDatPhong->mact)->first();
                    if (count($datPhong)==0)
                        break;
                    elseif ( !( ( date('d-m-Y', strtotime($ngayDen) ) > date('d-m-Y', strtotime($datPhong->ngaydi) ) ) ||
                            ( date('d-m-Y', strtotime($ngayDi)  ) < date('d-m-Y',strtotime($datPhong->ngayden) ) )
                          )
                        ){
                        $trung = 1;
                        break;
                    }
                }
                if ($trung == 0){
                    // tăng số phòng trống lên 1
                    $soPhongTrong++;
                    // thêm mã phòng hiện tại vào $ds_phongTrong
                    $ds_phongTrong[$i] = $phong->maphong;
                    $i++;
                }
                if ($soPhongTrong >= $soPhongCan){
                    $dapUng = 1;
                    break;
                }
            }

            if ($dapUng == 1) {
                //Thêm dữ liệu vô bảng khách hàng
                $kh = new khachhang();
                $kh->makh = $makh;
                $kh->tenkh = $hoTen;
                $kh->email = $email;
                $kh->sdt = $sdt;
                $kh->save();
                // thêm dữ liệu vào bảng datphong
                $datPhong = new datphong();
                $datPhong->mact = $mact;
                $datPhong->ngaydat = $ngayDat;
                $datPhong->ngayden = date('Y-m-d',strtotime($ngayDen));
                $datPhong->ngaydi = date('Y-m-d',strtotime($ngayDi));
                $datPhong->songuoilon = $nguoiLon;
                $datPhong->sotreem = $treEm;
                $datPhong->xacnhan = 0;
                $datPhong->malp = $malp;
                $datPhong->makh = $makh;
                $datPhong->maql = '';
                $datPhong->save();
                // thêm dữ liệu vào bảng chitiet_datphong
                for ($k=0; $k < $i ; $k++) { 
                    $ctDatPhong = new chitietdatphong();
                    $ctDatPhong->mact = $mact;
                    $ctDatPhong->maphong = $ds_phongTrong[$k];
                    $ctDatPhong->save();
                }
                
                // truyền thông tin về để thông báo
                session_start();
                $_SESSION['makh'] = $makh;
                $_SESSION['mact'] = $mact;
                return Response::json(['success'=>true]);
                    
                
            }
            else {
                //thông báo hết phòng
                return Response::json(['success'=>'het phong']);
            }

        }      
    }

    //XÓA ĐẶT PHÒNG BÊN QUẢN LÍ
    public function xoaDatPhong(Request $request){
        if(Request::ajax()){
            $mact = Request::get('mact');

            $tenkh = DB::table('datphong')
                    ->join('khach_hang','khach_hang.makh','=','datphong.makh')
                    ->select('khach_hang.tenkh')->where('mact',$mact)->first();

            //Xóa trong bảng khách hàng
            DB::table('khach_hang')
                    ->join('datphong','datphong.makh','=','khach_hang.makh')
                    ->where('mact',$mact)
                    ->delete();
            //Xóa trong bảng đặt phòng
            DB::table('datphong')->where('mact',$mact)->delete();

            //Xóa trong bảng chi tiết đặt phòng
            DB::table('chitiet_datphong')->where('mact',$mact)->delete();

            return Response::json(['success'=>true, 'tenkh'=>$tenkh->tenkh]);
        }
    }
    

    //XÁC NHẬN ĐẶT PHÒNG BÊN QUẢN LÍ
    public function luuXacNhanDatPhong(Request $request){
        if(Request::ajax()){
            $mact = Request::get('mact');
            $maql = Auth::user()->maql;

            $tenkh = DB::table('datphong')
                    ->join('khach_hang','khach_hang.makh','=','datphong.makh')
                    ->select('khach_hang.tenkh')->where('mact',$mact)->first();

            //Cập nhật lại trạng thái cột xác nhận của bảng chi tiết đặt phong
            DB::table('datphong')->where('mact',$mact)->update(['xacnhan'=>1, 'maql'=>$maql]);

            return Response::json(['success'=> true, 'tenkh'=>$tenkh->tenkh]);
        }
    }

    //CHỈNH SỬA THÔNG TIN ĐẶT PHÒNG BÊN QUẢN LÍ
    public function chinhSuaDatPhong(Request $request){
        if(Request::ajax()){
            $mact = Request::get('mact');

            session_start();
            //Lấy biến mã chi tiết này truyền qua bên cái chi tiết đặt phòng để lấy dl
            //QUA QLDATPHONGCONTROLLER
            $_SESSION['mact'] = $mact;
            return Response::json(['success'=>true]);
        }
    }
}
