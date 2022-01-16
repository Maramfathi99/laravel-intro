<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * السماح لتعامل المستخدم غير المسجل دخول
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
        //رقم المستخدم المنوي التعديل عليه
        $id = $this->route('user');
        return [
            'name'=>'required|max:50',
            'email'=>'required|email|max:50|unique:users,email,' . $id . ',id'
        ];
    }
}
