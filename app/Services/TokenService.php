<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Token;
use Carbon\Carbon;

class TokenService {
    public function getToken() {
        $token = Token::first();

        // Se não houver token ou se o token expirou, renove-o
        if ( !$token || $token->expires_at <= Carbon::now() ) {
            $this->refreshToken();
            $token = Token::first();
        }

        return $token->access_token;
    }

    private function refreshToken() {
        // Supondo que a API de renovação do token esteja disponível
        $response = Http::post( 'https://app.smshub.ao/api/authentication', [
            'authId'=> '203141109700229476',
            'secretKey'=> 'nOSwJwdQXjjmP2unrgPMRSbpksWbYfWukk3YdwJFuMATAIo38allbh8iBazioGTb7GC7AHvRDNVQon0s27D5ZltIEf51KlQwoN4B'
        ] );

        $data = $response->json();

        Token::updateOrCreate(
            [],
            [
                'access_token' => $data[ 'access_token' ],
                'expires_at' => Carbon::now()->addMonth(),
            ]
        );
    }
}
