<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class themDVRequest extends FormRequest
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
            'txtTieuDe' => 'required',
            'txtMoTa' => 'required',
            'txtNoiDung' => 'required',
            'imgChinh' => 'required|image',
            //'imgAnh'=>'image',
        ];
    }

    public function messages()
    {
        return [
            'txtTieuDe.required'=>'Tiêu đề không được trống',
            'txtMoTa.required'=>'Mô tả không được trống',
            'txtNoiDung.required'=>'Nội dung không được trống',
            'imgChinh.required'=>'Ảnh chính không được bỏ trống',
            'imgChinh.image'=>'Ảnh phải có đuôi jpg, png',
            //'imgAnh.image'=>'Ảnh phải có đuôi jpg, png'
        ];
    }
}
