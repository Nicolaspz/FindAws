<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService {
    protected $tokenService;

    public function __construct( TokenService $tokenService ) {
        $this->tokenService = $tokenService;
    }

    public function sendSms( $phoneNumber, $smsVerificationCode ) {
        $token = $this->tokenService->getToken();

        $response = Http::withHeaders( [
            'accessToken' => $token,
        ] )->post( 'https://app.smshub.ao/api/sendsms', [
            'contactNo' => [ $phoneNumber ],
            'message' => 'Seu Código de confirmação MeuKubiku é ' . $smsVerificationCode,
        ] );

        $data = $response->json();

        return $response->successful();
    }
}
