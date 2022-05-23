<?php


namespace App\Http\Validator;


use Illuminate\Http\Request;

interface UserApiValidatorInterface
{
    public function validate(Request $request);
}
