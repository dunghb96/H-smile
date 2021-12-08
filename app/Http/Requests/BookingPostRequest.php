<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $ruleArr=[
            // 'date' =>'required|date',
            // 'name'=>'required',
            // 'age'=>'required|min:6|max:100',
            // 'phone'=>'required|max:10',
            // 'gender'=>'required',
            // 'email'=>'required|email',
            // 'service'=>'required',
            // 'doctor'=>'required',

        ];

        return $ruleArr;
    }
    public function messages(){
        return [
            // 'date.required' =>'chưa chọn ngày',
            // 'date.date'  =>'tên phong da tồn tại',
            // 'price.required'=>'chưa nhập giá',
            // 'price.numeric'=>'giá không đúng định dạng',
            // 'floor.numeric'=>'tang phai la so',
            // 'floor.required'=>'chưa nhập số tang',
            // 'image.required'=>'bạn chưa chọn ảnh',
            // 'image.mimes'=>'file ảnh không đúng định dạng (jpg,bmp,png,jpeg)',
            // 'detail.required'=>'bạn chưa nhập chi tiết',
        ];
    }
}
