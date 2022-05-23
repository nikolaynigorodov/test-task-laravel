<?php


namespace App\Http\Helper;


use App\Http\Resources\PositionApiResource;

class PositionApiMessageHelper
{
    private $message = [];

    public function positionSuccess(PositionApiResource $positions)
    {
        $this->message = [
            "success" => true,
            "positions" => $positions
        ];

        return $this;
    }

    public function positionNotFound(): self
    {
        $this->message = [
            "success" => false,
            "message" => "Positions not found",
        ];

        return $this;
    }

    public function positionPageNotFound(): self
    {
        $this->message = [
            "success" => false,
            "message" => "Page not found",
        ];

        return $this;
    }

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return $this->message;
    }
}
