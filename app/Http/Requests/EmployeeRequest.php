<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $id = $this->route('employee');
        return [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'phone' => 'required|max:20',
            'email' => 'required|max:50|unique:employess,email,' . $id . ',id',
            'gender'=>'required|max:1',
            'empno'=>'required|max:10',
            'department_id'=>'required',
            'image'=>'image'
        ];
    }
}
