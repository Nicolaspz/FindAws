
<?php

// Função para obter o token de autenticação
function getAuthenticationToken() {
    $url = 'https://app.smshub.ao/api/authentication';
    $authId = '203141109700229476'; // Seu authId de 18 caracteres
    $secretKey = 'nOSwJwdQXjjmP2unrgPMRSbpksWbYfWukk3YdwJFuMATAIo38allbh8iBazioGTb7GC7AHvRDNVQon0s27D5ZltIEf51KlQwoN4B'; // Sua secretKey de 100 caracteres

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        'authId' => $authId,
        'secretKey' => $secretKey
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $data = json_decode($response, true);
        if (isset($data['data']['authToken'])) {
            return $data['data']['authToken'];
        }
    }

    return null;
}

// Função para enviar SMS

?>
