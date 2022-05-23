<?php


namespace App\Http\Validator;


use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserApiStoreValidate implements UserApiValidatorInterface
{

    public function validate(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:2', 'max:60'],
            'phone' => ['required', 'string', new PhoneNumber],
            'position' => ['required', 'exists:positions,id'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg', 'max:5120'],
            'email' => ['required', 'string', 'email', 'min:2', 'max:100', 'unique:users'],
        ]);
    }
}
