<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListByEmailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['email'] = $this->route('email');
        return $data;
    }
}

