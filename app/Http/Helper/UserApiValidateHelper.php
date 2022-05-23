<?php


namespace App\Http\Helper;


use App\Http\Validator\UserApiValidatorInterface;
use Illuminate\Http\Request;

class UserApiValidateHelper
{
    private $message = [];

    public function validate(Request $request, UserApiValidatorInterface $validatorClass): self
    {
        $validator = $validatorClass->validate($request);

        if($validator->errors()->count() > 0) {
            $this->addInMessage($validator->errors()->toArray());
        }

        return $this;
    }

    private function addInMessage(array $errors): void
    {
        $fails = [];
        foreach ($errors as $key => $message) {
            $fails[$key][] = $message[0];
        }

        $this->message = [
            "success" => false,
            "message" => "Validation failed",
            "fails" => $fails
        ];
    }

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return $this->message;
    }
}
