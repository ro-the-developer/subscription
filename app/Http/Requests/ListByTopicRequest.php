<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListByTopicRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'topic' => [
                'required',
                Rule::exists('topics', 'id'),
            ],
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['topic'] = $this->route('topic');
        return $data;
    }
}

