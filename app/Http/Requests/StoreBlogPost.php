<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
        return [
            'blogPostTitle' => 'bail|required|min:5|max:100',
            'blogPostContent' => 'required|min:10'
        ];
        /**
         * bail = Stop running validation rules for the field after the first validation failure
         * required = The field under validation must be present in the input data and not empty.
         * min:value = minimum value on the blogPostTitle is <value>
         * max:value = max value on the blogPostTitle is <value>
         * blogPostContent = required, minimal 10 values, no maximum values.
         */
    }
}
