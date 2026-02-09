<?php
$token = 'v+eaOz738obBhsx/FgwQTg==:HKCSHFPwivRwaKGcf9ngkpYJND5dckk02dZ2yjq/hym5nDk55yecPkSBK5nE3Jj2j5V7YRf1suV0NNkd4bz+9SqlPUuNXa/p0kCk6FlyaLtQbVfE6fU/b81zqeMV7jtfN/KyECXW4TcCcf8NDZspAedouXM3w/4mGOfwDhLS1PM=';

// $ch = curl_init("https://api.thewayl.com/api/v1/verify-auth-key");

// curl_setopt_array($ch, [
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_HTTPHEADER => [
//         "X-WAYL-AUTHENTICATION: $token",
//         "Accept: application/json",
//     ],
// ]);

// $response = curl_exec($ch);
// curl_close($ch);

// print_r(json_decode($response, true));
// exit;






$data = [
    'referenceId' => 'order_1236',
    'total' => 1000,
    'currency' => 'IQD',
    'lineItem' => [
        [
            'label' => 'PPricing 12',
            'amount' => 1000,
            'type' => 'increase',
            'image' => 'https://example.com/image.jpg'
        ]
    ],
    'webhookUrl' => 'https://93f8-103-121-60-46.ngrok-free.app/webhook.php',
    'webhookSecret' => 'ronok_konok',
    'redirectionUrl' => 'https://93f8-103-121-60-46.ngrok-free.app/success.php'
];

$ch = curl_init("https://api.thewayl.com/api/v1/links");
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "X-WAYL-AUTHENTICATION: $token",
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($data),
]);

$response = curl_exec($ch);
curl_close($ch);

print_r(json_decode($response, true));
