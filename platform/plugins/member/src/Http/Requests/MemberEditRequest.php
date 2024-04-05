<?php

namespace Botble\Member\Http\Requests;

use Botble\Support\Http\Requests\Request;

class MemberEditRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'phone'      => 'required|max:60|min:6|unique:members,phone,' . $this->route('member'),
        ];

        if ($this->input('is_change_password') == 1) {
            $rules['password'] = 'required|min:6|confirmed';
        }

        return $rules;
    }
}
