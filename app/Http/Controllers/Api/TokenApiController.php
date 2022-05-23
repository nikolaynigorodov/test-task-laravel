<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Token;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class TokenApiController extends Controller
{
    public function createToken(): JsonResponse
    {
        $token = hash('sha256', Str::random(60));
        Token::create([
            'token' => $token,
            'finish' => new \DateTime('+40 minutes')
        ]);

        return response()->json([
            'success' => true,
            'token' => $token
        ], 200);
    }
}
