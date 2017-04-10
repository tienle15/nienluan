<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class khuyenMaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtTieuDe'=>'required',
            'txtngayBD'=>'required',
            'txtngayKT'=>'required|after:txtngayBD',  //ngày kết thúc phải sau ngày bắt đầu
            'txtChietKhau'=>'required|numeric',
            'txtMoTa'=>'required',
            'txtNoiDung'=>'required',
            'txtLoaiPhong'=>'required',
            'imgKM'=>'required', //|image'
        ];
    }

    public function messages(){
        return[
            'txtTieuDe.required'=>'Tiêu đề không được trống',
            'txtngayBD.required'=>'Ngày bắt đầu không được trống',
            'txtngayKT.required'=>'Ngày kết thúc không được trống',
            'txtngayKT.after'=>'Ngày kết thúc phải lớn hơn ngày bắt đầu',
            'txtChietKhau.required'=>'Chiết khấu không được trống',
            'txtChietKhau.numeric'=>'Trường này không được nhập kí tự',
            'txtMoTa.required'=>'Mô tả không được rỗng',
            'txtNoiDung.required'=>'Nội dung không được trống',
            'txtLoaiPhong.required'=>'Chọn ít nhất một loại phòng để áp dụng',
            'imgKM.required'=>'Ảnh khuyến mãi không được trống',
            //'imgKM.image'=>'Ảnh phải có đuôi jpg, png'
        ];
    }
}
