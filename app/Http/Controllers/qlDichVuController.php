<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\themDVRequest;
use App\dichvu;
use App\anhdv;
use Validator;
use	DB;
use	Auth;
use Illuminate\Support\Facades\Input; 
//use Request;
use File;
use Response;

class qlDichVuController extends Controller
{	
	//Mã dịch vụ tự tăng
	public function maDV(){
		$madv_list = DB::table('dich_vu')->select('madv')->get();
		$max = 0;
		foreach ($madv_list as $value) {
			$catchuoi = substr($value->madv, 2);
			if($catchuoi > $max)
				$max = $catchuoi;
		}
		//echo '<pre>';
		//print_r($madv);
		$so = $max+1;
        if($so < 10){
            $madv_new = 'DV0'.$so;
        }
        else{
            $madv_new = 'DV'.$so;		
        }
		return $madv_new;
	}

    public function qlDichVu(){
    	$dsdv = DB::table('dich_vu')->paginate(5);
    	$row = count($dsdv);

    	return view('quanli.qldichvu')->with('dsdv',$dsdv)->with('tongDV',$row);
    }

    public function themDV(){
    	return view('quanli.themdv');
    }

    public function luuDV(themDVRequest $request){
    	$maql = Auth::user()->maql;
    	$madv = $this->maDV();
        //Lấy tên ảnh chính ra
        $tenanhdv = $request->file('imgChinh')->getClientOriginalName();
 
    	//Thêm dữ liệu vào bảng dịch vụ
    	$dv = new dichvu(); //model dichvu();
    	$dv->madv = $madv;
        $dv->tendv = $request->txtTieuDe;
        $dv->anhdv = $tenanhdv;
    	$dv->mota = $request->txtMoTa;
    	$dv->noidungdv = $request->txtNoiDung;
    	$dv->maql = $maql;
    	$dv->save();	

        //Thêm ảnh chính vô thư mục public/dichvu/
        $request->file('imgChinh')->move('public/dichvu/',$tenanhdv);

    	//Thêm ảnh phụ vào bảng hình ảnh
    	if($request->file('imgAnh') != ''){
    		foreach ($request->file('imgAnh') as $file) {
    			if(isset($file)){
    				//Lấy tên ảnh ra
			   		$img_name = $file->getClientOriginalName(); 

			   		$anh = new anhdv();
			    	$anh->tenanh = $img_name;
			    	$anh->madv = $madv;
					$anh->save();

			    	//Chuyển ảnh đến thư mục public/dichvu
			    	$file->move('public/dichvu/', $img_name);
			    }
		    }
	   	}

	   	return redirect('quanli/qldichvu'); 
    }

    public function chiTietDV($madv){
    	//Lấy 1 dòng dữ liệu bên bảng dv với $madv (trả về một đối tượng)
    	$ds = DB::table('dich_vu')->where('madv',$madv)->first();

    	//Lấy danh sách một mảng các đối tượng trong trong bảng hình ảnh
    	$img = DB::table('anh_dv')->where('madv',$madv)->get();
    	
    	return view('quanli.chitietdv')->with('dv',$ds)->with('img',$img);
    }

    public function luuCapNhat(Request $request){
        $v = Validator::make($request->all(),
            [
                'txtTieuDe'=>'required',
                'txtMoTa'=>'required',
                'txtNoiDungDV'=>'required'
            ],
            [
                'txtTieuDe.required'=>'Tiêu đề không được rỗng',
                'txtMoTa.required'=>'Mô tả không được rỗng',
                'txtNoiDungDV.required'=>'Nội dung không được rỗng'
            ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
        }else{
            $maql = Auth::user()->maql;
            $madv = $request->txtMaDV;
            $tendv = $request->txtTieuDe;
            $mota = $request->txtMoTa;
            $noidungdv = $request->txtNoiDungDV;

            //Cập nhật lại bảng dịch vụ
            if(!empty($request->file('imgChinh'))){
                //Xóa ảnh chính cũ trong thư mục
                $anhcu = DB::table('dich_vu')->where('madv',$madv)->first();
                $duongdan = 'public/dichvu/'.$anhcu->anhdv;
                if(File::exists($duongdan)){
                    File::delete($duongdan);
                }

                //Lấy tên ảnh chính mới
                $anhchinh = $request->file('imgChinh')->getClientOriginalName();

                DB::table('dich_vu')->where('madv',$madv)->update(['tendv'=>$tendv, 'anhdv'=>$anhchinh ,'mota'=>$mota, 'noidungdv'=>$noidungdv, 'maql'=>$maql]);
                //Thêm ảnh chính mới vào thư mục
                $request->file('imgChinh')->move('public/dichvu/',$anhchinh);
            }else{
                DB::table('dich_vu')->where('madv',$madv)->update(['tendv'=>$tendv,'mota'=>$mota, 'noidungdv'=>$noidungdv, 'maql'=>$maql]);
            }   

            //Thêm ảnh phụ vô bảng ảnh dịch vụ
            if($request->file('imgAnh') != ''){
                foreach ($request->file('imgAnh') as $file) {
                    if(isset($file)){
                        //Lấy tên ảnh ra
                        $img_name = $file->getClientOriginalName(); 

                        $anh = new anhdv();
                        $anh->tenanh = $img_name;
                        $anh->madv = $madv;
                        $anh->save();

                        //Chuyển ảnh đến thư mục public/dichvu
                        $file->move('public/dichvu/', $img_name);
                    }
                }
            }

            return redirect('quanli/qldichvu');
        }
    }

}
