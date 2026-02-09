<?php
// save_payment.php
$data = json_decode(file_get_contents("php://input"), true);

// Save $data['id'], $data['status'], etc. into database
file_put_contents('moyasar_payments.log', print_r($data, true), FILE_APPEND);

// You can also insert into DB or trigger notification here
http_response_code(200);
echo json_encode(['message' => 'Saved']);
?>