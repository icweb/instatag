<?php

namespace App\Http\Requests;

use App\Group;
use Illuminate\Foundation\Http\FormRequest;

class CreatesHashtags extends FormRequest
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
            'priority' => 'required|integer|max:11|min:0',
            'group' => 'required|integer|max:11',
            'hashtag' => 'required|string|max:255|alpha_num'
        ];
    }
}
