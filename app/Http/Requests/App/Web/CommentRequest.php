<?php

namespace App\Http\Requests\App\Web;

use Illuminate\Foundation\Http\FormRequest;

/**
 * CommentRequest Class handle validation of use comment requests.
 * 
 * @package App\Http\Requests\App\Web
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class CommentRequest extends FormRequest
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
                'content' => 'required',
            ];
        }
    }
}
