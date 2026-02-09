
<?php
// checkout_return.php
$sid = $_GET['sid'] ?? '';
if ($sid === '') {
    http_response_code(400);
    exit('Missing transaction ID (sid).');
}

$verifyEndpoint = 'https://api.sifalopay.com/gateway/verify.php';
$ch = curl_init($verifyEndpoint);
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
    CURLOPT_POSTFIELDS     => json_encode(['sid' => $sid]),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 30,
]);
$response = curl_exec($ch);
if ($response === false) {
    http_response_code(502);
    exit('Verify cURL error: ' . curl_error($ch));
}
$http = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$data = json_decode($response, true);
if ($http < 200 || $http >= 300 || empty($data['sid']) || !isset($data['status'])) {
    http_response_code(502);
    exit('Verify failed.');
}

if ($data['status'] === 'success') {
    echo '✅ Payment successful. SID: ' . htmlspecialchars($data['sid']);
} elseif ($data['status'] === 'pending') {
    echo '⏳ Payment pending. SID: ' . htmlspecialchars($data['sid']);
} else {
    echo '❌ Payment failed. SID: ' . htmlspecialchars($data['sid']);
}
