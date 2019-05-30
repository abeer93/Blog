<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * ArticleRequest Class handle validation of admin articles requests.
 * 
 * @package App\Http\Requests\Admin
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class ArticleRequest extends FormRequest
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
        // validate post request
        if ($this->method() == 'POST') {
            return [
                'title'       => 'required|min:3||max:191',
                'content'     => 'required',
                'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'required|exists:categories,id',
            ];
        }
    }
}
