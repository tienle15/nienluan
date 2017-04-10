<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Auth, Validator, Hash;
use App\User;
use Illuminate\Routing\Redirector;
use Request;
use Response;
use DB;


class quanLiController extends Controller
{
    public function thongTinQL(Request $request){
    	if(Request::ajax()){
            //Lấy dữ liệu gửi từ ajax qua
            $maql = Request::get('maql');
            $email = Request::get('email');
            $password1 = Request::get('password1');
            $password2 = Request::get('password2');
            $_token = Request::get('_token');

            //Lấy mật khẩu hiện tại so sánh khi nhập lại
            $pass = DB::table('users')->where('maql',$maql)->first();
            $pass_cr = $pass->password;
            //Kiểm tra dữ liệu
            $v = Validator::make(Request::all(),
            [
                'email' => 'required|email|max:100', //unique|
                'password1' => 'required|min:8', 
                'password2' => 'required|same:password1',
            ],
            [
                'email.required' => 'Email không được rỗng',
                'email.email' => 'Email không đúng định dạng',
                'password1.required' => 'Mật khẩu mới không được rỗng',
                'password1.different' => 'Mật khẩu này phải khác mật khẩu cũ',
                'password1.min' => 'Mật khẩu ít nhất 8 kí tự',
                'password2.required' => 'Xác nhận mật khẩu không được rỗng',
                'password2.same' => 'Không khớp mật khẩu',
            ]);

            if($v->fails()){
                return Response::json([
                    'success'=>false,
                    'errors'=>$v->errors()->toArray()
                ]);
            } 
            else{
                DB::table('users')->where('maql',$maql)->update(['email'=>$email, 'password'=>Hash::make($password1)]);

                return Response::json(['success'=>true]);
            }
        }
    }

    public function luuThemQL(Request $request){
    	if(Request::ajax()){
            //Lấy dữ liệu từ ajax
            $maql = Request::get('maql');
            $name = Request::get('name');
            $email = Request::get('email');
            $password1 = Request::get('password1');
            $password2 = Request::get('password2');
            $_token = Request::get('_token');

            //Kiểm tra dữ liệu
            $v = Validator::make(Request::all(), 
            [
                'maql' => 'required',
                'name' => 'required|max:50', //alpha|
                'email' => 'required|email|unique:users|max:100', //unique|
                'password1' => 'required|min:8',
                'password2' => 'required|same:password1',
            ],
            [
                'maql.required' => 'Mã quản lí không được rỗng',
                'name.required' => 'Tên quản lí không được rỗng',
               // 'name.alpha' => 'Trường này không được nhập số',
                'email.required' => 'Email không được rỗng',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email không được trùng',
                'password1.required' => 'Mật khẩu không được rỗng',
                'password1.min' => 'Mật khẩu ít nhất 8 kí tự',
                'password2.required' => 'Xác nhận mật khẩu không được rỗng',
                'password2.same' => 'Không khớp mật khẩu',
            ]  
            );

            if($v->fails()){
                return Response::json([
                    'success'=>false, 
                    'errors'=>$v->errors()->toArray()
                ]);
            }else{
                $user = new User();
                $user->maql = $maql;
                $user->name = $name;
                $user->email = $email;
                $user->password = Hash::make($password1);
                $user->remember_token = $_token;
                $user->save();

                return Response::json(['success'=>true]);
            }
        }
    }

}
