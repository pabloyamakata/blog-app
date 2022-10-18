<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user_id == auth()->user()->id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|unique:posts',
            'status' => 'required|in:draft,published',
            'category' => 'required'
        ];

        if($this->status == 'published') {
            $rules = array_merge($rules, [
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }

        return $rules;
    }
}
