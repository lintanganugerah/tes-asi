<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nomor" => "required|numeric|digits_between:1,15",
            "nama" => "required|string|max:150",
            "jabatan" => "sometimes|string|max:200",
            "talahir" => "date_format:Y-m-d H:i:s",
            "photo_upload_path" => "sometimes|string|max:150",
            "created_by" => "sometimes|string|max:150",
            "updated_by" => "sometimes|string|max:150",
            "deleted_on" => "sometimes|string|max:45",
        ];
    }
}
