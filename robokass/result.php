<?php
// result.php: Handle payment notification (ResultURL) from Robokassa

// --- Configuration ---
// Replace with your actual Password#2 from Robokassa account settings
$merchantPassword2 = "QP4fxQsHF6nKWG69cYl6";

// Retrieve parameters from the request (GET or POST)
$outSum            = isset($_REQUEST['OutSum']) ? $_REQUEST['OutSum'] : "";
$invId             = isset($_REQUEST['InvId']) ? $_REQUEST['InvId'] : "";
$receivedSignature = isset($_REQUEST['SignatureValue']) ? strtoupper($_REQUEST['SignatureValue']) : "";

// Log the entire request for debugging (optional)
file_put_contents('ronok.txt', print_r($_REQUEST, true) . "\n", FILE_APPEND | LOCK_EX);

// Calculate expected signature using MD5 (using uppercase for comparison)
$expectedSignature = strtoupper(md5("$outSum:$invId:$merchantPassword2"));

// Validate the signature
if ($receivedSignature === $expectedSignature) {
   
    // Log the successful update (optional)
    file_put_contents('ronok12.txt', "Order $invId updated as paid.\n", FILE_APPEND | LOCK_EX);

    // Respond to Robokassa with the expected message
    echo "OK" . $invId;
    exit;
} else {
    file_put_contents('ronok36.txt', "Error: Invalid signature for InvId $invId.\n", FILE_APPEND | LOCK_EX);
    error_log("Robokassa payment error: Invalid signature for InvId $invId");
    echo "Error: Invalid signature";
    exit;
}
?>
