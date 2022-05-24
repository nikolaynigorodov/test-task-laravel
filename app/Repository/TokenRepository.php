<?php


namespace App\Repository;


use App\Models\Token;
use Illuminate\Database\Eloquent\Collection;

class TokenRepository
{
    public function findToken(string $token): Collection
    {
        $date = new \DateTime('now');

        return Token::where('token', $token)->where('finish', '>', $date)->get();
    }

    public function removeToken(string $token): void
    {
        $token = Token::where('token', $token);
        if($token) {
            $token->delete();
        }
    }
}
