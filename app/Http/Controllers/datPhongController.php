<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Request;
use Validator;
use Response;

class datPhongController extends Controller
{
    public function datPhong(Request $request){
        //Từ thanh ngang phía trên
    	$ngayden = $request->txtNgayDen;
        $ngaydi = $request->txtNgayDi;
        $nguoilon = $request->cboNgLon;
        $treem = $request->cboTreEm;
        //Từ giao diện chi tiết phòng
        $malp = $request->txtMaLP;
    	
        if($ngayden == '' || $ngaydi == ''){
            $today = date('d-m-Y');
            $addDay = date('d-m-Y',strtotime($today."+ 2 day"));

            return view('khach.datphong')->with('ngayden',$today)->with('ngaydi',$addDay)->with('nguoilon',$nguoilon)->with('treem',$treem)->with('malp',$malp);
        }else{
            return view('khach.datphong')->with('ngayden',$ngayden)->with('ngaydi',$ngaydi)->with('nguoilon',$nguoilon)->with('treem',$treem)->with('malp',$malp);
        }  
    }

    
}
