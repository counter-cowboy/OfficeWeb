<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'excel' => 'file|required|mimes:xls,xlsx'
        ];
    }

    public function messages()
    {
        return [
            'excel.file' => 'This field must be xls-file',
            'excel.required' => 'You must choose file. XLS or XLSX only!',
            'excel.mimes' => 'Only xls (xlsx) files'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
