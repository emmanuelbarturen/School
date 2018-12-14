<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StudentRequest
 * @package App\Http\Requests
 */
class StudentRequest extends FormRequest
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
            'names' => 'required|max:50',
            'email' => 'required|max:255|unique:students,email,' . $this->route('alumno', 0),
        ];
    }
}
