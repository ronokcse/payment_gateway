<?php
/**
 * M-Pesa STK Push Callback Handler
 * 
 * Safaricom এই endpoint এ callback পাঠাবে
 */

// Read raw POST data
$raw = file_get_contents('php://input');

// Log raw callback
file_put_contents(__DIR__ . '/callback_log.txt', date('Y-m-d H:i:s') . "\n" . $raw . "\n\n", FILE_APPEND);

// Parse JSON
$data = json_decode($raw, true);

// Extract result code
$resultCode = $data['Body']['stkCallback']['ResultCode'] ?? null;
$resultDesc = $data['Body']['stkCallback']['ResultDesc'] ?? null;
print_r($resultCode);
// If success (ResultCode = 0)
if ($resultCode == 0) {
    // Extract success data
    $metadata = $data['Body']['stkCallback']['CallbackMetadata']['Item'] ?? [];
    $receipt_number = null;
    $amount = null;
    $phone = null;
    
    foreach ($metadata as $item) {
        if ($item['Name'] === 'MpesaReceiptNumber') {
            $receipt_number = $item['Value'];
        }
        if ($item['Name'] === 'Amount') {
            $amount = $item['Value'];
        }
        if ($item['Name'] === 'PhoneNumber') {
            $phone = $item['Value'];
        }
    }
    
    // Log success response
    $success_log = [
        'timestamp' => date('Y-m-d H:i:s'),
        'status' => 'SUCCESS',
        'receipt_number' => $receipt_number,
        'amount' => $amount,
        'phone' => $phone,
        'result_desc' => $resultDesc,
    ];
    
    file_put_contents(
        __DIR__ . '/success_log.txt',
        json_encode($success_log, JSON_PRETTY_PRINT) . "\n\n",
        FILE_APPEND
    );
}

// Respond to Safaricom (must return JSON)
header('Content-Type: application/json');
echo json_encode([
    'ResultCode' => 0,
    'ResultDesc' => 'Callback received successfully'
]);

?>
