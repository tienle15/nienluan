<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use DB;
use Request;
use Response;
use Validator;
use App\phong;

class qlPhongController extends Controller
{
    public function quanLiPhong(){
    	$dslp = DB::table('loai_phong')->get();
    	//echo '<pre>';
    	//print_r($dslp);
    	$phong = DB::table('phong')->paginate(10);
    	$rowphong = DB::table('phong')->count('maphong');

    	return view('quanli.qlphong')->with('lp',$dslp)->with('phong',$phong)->with('row',$rowphong);
    }

    public function themPhong(Request $request){
    	if(Request::ajax()){
    		//Lấy dữ liệu từ ajax
    		$tenphong = Request::get('tenphong');
    		$malp = Request::get('malp');

    		//Kiểm tra dữ liệu nhập vào
    		$v = Validator::make(Request::all(),
    		[
    			'tenphong'=>'required',
    			'malp'=>'required'
    		],
    		[
    			'tenphong.required'=>'Tên phòng không được rỗng',
    			'malp.required'=>'Chưa chọn loại phòng'
    		]);

    		//Mã phòng theo loại phòng tự tăng
    		$ma_list = DB::table('phong')->select('maphong')->where('malp',$malp)->get();
			$max = 0;
			foreach ($ma_list as $value){
				$catchuoi = substr($value->maphong, 2);
				if($catchuoi > $max)
					$max = $catchuoi;
			}
			//echo '<pre>';
			//print_r($madv);
			$so = $max+1;
            if($so < 10)
                $maphong_tang = '0'.$so;
            else 
                $maphong_tang = $so;

            //Mã phòng mới sau khi tăng, dựa theo mã loại phòng
			if($malp=='LP001'){
                $maphong = 'ST'.$maphong_tang;
			}
			if($malp=='LP002'){
                $maphong = 'SU'.$maphong_tang;
			}
			if($malp=='LP003'){
                $maphong = 'DE'.$maphong_tang;
			}
			if($malp=='LP004'){
                $maphong = 'PR'.$maphong_tang;
			}
			if($malp=='LP005'){
                $maphong = 'JU'.$maphong_tang;
			}


    		//Trả về kết quả cho ajax
    		if($v->fails()){
    			return Response::json([
    				'success'=>false,
    				'errors'=>$v->errors()->toArray()
    			]);
    		} else {
    			$tbphong = new phong();
    			$tbphong->maphong = $maphong;
    			$tbphong->tenphong = $tenphong;
    			$tbphong->tinhtrang = 0;  //Mặc định mới thêm phòng thì phòng trống
    			$tbphong->malp = $malp;
    			$tbphong->save();

    			return Response::json(['success'=>true]);
    		}
    	}
    }

    public function capNhatTTPhong(){
    	$dsphong = DB::table('phong')->paginate(10);
    	$row = count($dsphong);

    	return view('quanli.capnhatttphong')->with('dsphong',$dsphong)->with('row',$row);
    }

    public function luuCNTTPhong(){
    	if(Request::ajax()){
    		//Lấy dữ liệu từ ajax gửi qua
    		$maphong = Request::get('maphong');
    		$tenphong = Request::get('tenphong');
    		//$loaiphong = Request::get('loaiphong'); //Mã của loại phòng
    		$tinhtrang = Request::get('tinhtrang');

    		$v = Validator::make(Request::all(),
    			[
    				'tenphong' => 'required',
    			],
    			[
    				'tenphong.required'=>'Tên phòng không được rỗng'
    			]);

    		if($v->fails()){
    			return Response::json([
    				'success'=>false,
    				'errors'=>$v->errors()->toArray()
    			]);
    		}else{
    			DB::table('phong')->where('maphong',$maphong)->update(['tenphong'=>$tenphong, 'tinhtrang'=>$tinhtrang]);

    			return Response::json(['success'=>true]);
    		}
    	}
    }

}
