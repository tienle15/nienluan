<?php
 
namespace App\Http\Controllers;
 

use App\dichvu;
use App\anhdv;
use DB;

 
class dichVuController extends Controller
{
    public function chiTietDV($madv){
        //dùng madv trả về đối tượng dv tương ứng
        $dv = DB::table('dich_vu')->where('madv',$madv)->first();
        //Lấy danh sách các hình ảnh của dv
        $ds_anhDv = DB::table('anh_dv')->where('madv',$madv)->get();
        
        return view('khach.chitietdv')->with('dv',$dv)->with('ds_anhDv',$ds_anhDv);
    }
}