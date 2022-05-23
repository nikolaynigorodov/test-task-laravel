<?php


namespace App\Http\Helper;


use App\Http\Resources\UserApiResource;
use App\Models\User;

class UserApiMessageHelper
{
    private $message = [];

    public function checkUser(int $userCount): self
    {
        if(!$userCount) {
            $this->pageNotFound();
        }
        return $this;
    }

    private function pageNotFound(): void
    {
        $this->message = [
            "success" => false,
            "message" => "Page not found",
        ];
    }

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return $this->message;
    }

    public function registerSuccess(User $user): self
    {
        $this->message = [
            "success" => true,
            "user_id" => $user->id,
            "message" => "New user successfully registered",
        ];

        return $this;
    }

    public function tokenExpired(): self
    {
        $this->message = [
            "success" => false,
            "message" => "The token expired.",
        ];

        return $this;
    }

    public function tokenNull(): self
    {
        $this->message = [
            "success" => false,
            "message" => "No Token in Header.",
        ];

        return $this;
    }

    public function imagesUrlBad(): self
    {
        $this->message = [
            "success" => false,
            "message" => "Url to images is bad.",
        ];

        return $this;
    }

    public function showUserValidFails()
    {
        $this->message = [
            "success" => false,
            "message" => "Validation failed",
            "fails" => [
                "user_id" => [
                    "The user_id must be an integer."
                ]
            ]
        ];

        return $this;
    }

    public function showUserNotFound()
    {
        $this->message = [
            "success" => false,
            "message" => "The user with the requested identifier does not exist",
            "fails" => [
                "user_id" => [
                    "User not found"
                ]
            ]
        ];

        return $this;
    }

    public function showUserSuccess(UserApiResource $user)
    {
        $this->message = [
            "success" => true,
            "user" => [
                $user
            ]
        ];

        return $this;
    }
}
