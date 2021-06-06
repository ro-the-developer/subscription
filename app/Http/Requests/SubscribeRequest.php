<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscribeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $email = $this->route('email');

        return  [
            'email' => 'required|email',
            'topic' => [
                'required',
                Rule::exists('topics', 'id'),
                Rule::unique('subscriptions','topic_id')->where('email', $email),
            ],
        ];
    }
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['email'] = $this->route('email');
        $data['topic'] = $this->route('topic');
        return $data;
    }
}

