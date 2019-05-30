<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * CategoryRequest Class handle validation of admin category requests.
 * 
 * @package App\Http\Requests\Admin
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class CategoryRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'name'        => 'required',
                'description' => 'required',
            ];
        }
    }
}
