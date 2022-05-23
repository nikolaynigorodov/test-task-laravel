<?php


namespace App\Http\Validator;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserApiIndexValidate implements UserApiValidatorInterface
{

    public function validate(Request $request)
    {
        return Validator::make($request->all(), [
            'page' => 'integer|min:1',
            'offset' => 'integer|min:0',
            'count' => 'integer|min:1|max:100'
        ]);
    }
}
