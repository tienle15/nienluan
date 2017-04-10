<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\dangNhapRequest;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/quanli/qldatphong';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getDangXuat']);  
        //Gọi getDangXuat để chuyển hướng khi bấm Đăng Xuất
    }

    public function getDangNhap(){
        return view('auth.dangnhap');
    }

    public function postDangNhap(dangNhapRequest $request){
        $auth = array(
                    'email'=>$request->txtEmail,
                    'password'=>$request->txtMatKhau
                );

        if(Auth::attempt($auth)){
            return redirect('quanli/qldatphong');
        } else {
            return redirect()->back()->withErrors('Email hoặc mật khẩu không đúng !');
        }
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect('dangnhap');
    }
}
