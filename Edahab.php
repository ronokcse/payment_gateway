<?php



 
  function create($edahabNumber, $amount, $agentCode, $currency) {
 
    $apiKey = "IM5Q5L5Ta77whrhcSihgYpYQGfk1LBvu9vrhKQY8m";
    $secretKey = "JJ1ot16DUhtTUFXUzaUYDOrlbgNMshqBeWborB";

    $request_param = array(
        "apiKey" => $apiKey,
        "edahabNumber" => $edahabNumber,
        "amount" => $amount,
        "agentCode" => $agentCode,
        "currency" => $currency,
        "returnUrl"=>"https://10fa-103-121-60-46.ngrok-free.app/google_sheet/edahab_test"
    );

    /* Convert the array to a JSON string. */
    $json = json_encode($request_param, JSON_UNESCAPED_SLASHES);

    // Create a SHA256 hash of the JSON string concatenated with the secret key.
    $hashed = hash('SHA256',$json.$secretKey);

    // Construct the API endpoint URL with the hash.
    $url = "https://edahab.net/api/api/IssueInvoice?hash=" . $hashed;

    // Initialize cURL session.
    $curl = curl_init($url);

    // Configure cURL to send a POST request.
    curl_setopt($curl, CURLOPT_POST, TRUE);

    // Attach the JSON string as the POST body.
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

    // Set the content type to application/json.
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // Execute the request and get the response.
    $result = curl_exec($curl);

    // Close the cURL session.
    curl_close($curl);

    // Return the API response.
    return $result;
}

// Example usage of the function
$edahabNumber = "659000659"; // Replace with actual number
$amount = 500;
$agentCode = "743031";
$currency = "SLSH";

$response = create($edahabNumber, $amount, $agentCode, $currency);

// Output the response
echo $response;


940fc8f6fefe42ee9ea36f448bc0b59c
