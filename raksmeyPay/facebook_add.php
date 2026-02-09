<?php

// $campaign_id = '6787742165818';

// *****************************Create a campaign for a WhatsApp Business API ad account*********************************
$accessToken = 'EAAg2GW3gyXMBO5MxBIqb6rLrWb05pefQZActFOoGNgbrxQQzcT5fAWiIGY9KtCNAofsL6mcJq01U76mcfs72HEaHHZARZAEAWzBMGm274fTCpZA1kGTA3J3ykZAJgbSAqTfOLfhb8Bb3n1IKl2cVFAGPbbFdAnxSTjiWnglPfGKrfvsTTxuxWmQZDZD'; // Replace with your valid access token
$adAccountId = '55140987'; // Replace with your Meta ad account ID




// $url = "https://graph.facebook.com/v18.0/act_{$adAccountId}/customaudiences?fields=id,name&access_token={$accessToken}";

// // Initialize cURL
// $ch = curl_init();

// // Set cURL options
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// // Execute cURL request
// $response = curl_exec($ch);

// // Check for errors
// if (curl_errno($ch)) {
//     echo 'cURL error: ' . curl_error($ch);
// } else {
//     $data = json_decode($response, true);
//     echo "<pre>";
//     print_r($data);
//     echo "</pre>";
// }

// // Close cURL session
// curl_close($ch);

// exit;










// $url = "https://graph.facebook.com/v22.0/act_{$adAccountId}/campaigns";

// $campaignData = [
//     'name' => 'Ronok Whatsapp Test Campaign',
//     'objective' => 'OUTCOME_ENGAGEMENT',
//     'status' => 'ACTIVE',
//     'special_ad_categories' => ['EMPLOYMENT'], // Direct array, no json_encode()
//     'access_token' => $accessToken
// ];

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v22.0/act_{$adAccountId}/campaigns");
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($campaignData)); // Convert array to URL-encoded format
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, [
//     'Content-Type: application/x-www-form-urlencoded'
// ]);

// $response = curl_exec($ch);
// $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// curl_close($ch);

// if ($httpCode == 200) {
//     $responseData = json_decode($response, true);
//     echo "<pre>";
//     print_r($responseData);
//     echo "</pre>";
//     echo "Campaign Created Successfully! ID: " . $responseData['id'];
// } else {
//     echo "Error creating campaign: " . $response;
// }
// exit;


//******************************* * Get Campaign details*********************************



// $adCampaignId = '120223173651960716'; // Replace with your actual campaign ID

// $url = "https://graph.facebook.com/v22.0/{$adCampaignId}";

// $params = [
//     'fields' => 'id,account_id,name,status,objective,daily_budget,special_ad_categories',
//     'access_token' => $accessToken
// ];

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, [
//     'Content-Type: application/json'
// ]);

// $response = curl_exec($ch);
// $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// curl_close($ch);

// if ($httpCode == 200) {
//     $responseData = json_decode($response, true);
//     echo "<pre>";
//     print_r($responseData);
//     echo "</pre>";
// } else {
//     echo "Error retrieving campaign details: " . $response;
// }
// exit;


//******************************* * Update Campaign details*********************************

// $adCampaignId = '6738013061618'; // Replace with your actual campaign ID

// $url = "https://graph.facebook.com/v22.0/{$adCampaignId}";

// $campaignData = [
//     'name' => 'Ronok Updated Campaign Name', // New name for the campaign
//     'status' => 'ACTIVE', // Options: ACTIVE, PAUSED, DELETED, ARCHIVED
//     'daily_budget' => '100', // Set new daily budget (in cents, 10000 = $100)
//     'special_ad_categories' => ['EMPLOYMENT'], // Update special ad categories
//     'access_token' => $accessToken
// ];

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($campaignData)); 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, [
//     'Content-Type: application/x-www-form-urlencoded'
// ]);

// $response = curl_exec($ch);
// $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// curl_close($ch);

// if ($httpCode == 200) {
//     $responseData = json_decode($response, true);
//     echo "<pre>";
//     print_r($responseData);
   
// } else {
//     echo "Error updating campaign: " . $response;
// }
// ******************Step 2: Create an ad set*************************

// $adCampaignId = '120223174145900716'; // Get from Step 1
// $url = "https://graph.facebook.com/v22.0/act_{$adAccountId}/adsets";

// $adSetData = [
//     'name' => 'Ronok WhatsApp Ad Set',
//     'bid_amount' => 100, 
//     'billing_event' => 'IMPRESSIONS',
//     'campaign_id' => $adCampaignId,
//     'daily_budget' => 200, // $50 in cents
//     'destination_type' => 'WHATSAPP',
//     'optimization_goal' => 'IMPRESSIONS',
//     'promoted_object' => json_encode(['page_id' => '518825357974924']), // mostofa_club page id
//     'status' => 'ACTIVE',
//     'targeting' => json_encode([
//         'geo_locations' => ['countries' => ['BD']], // Bangladesh
//         'device_platforms' => ['mobile','desktop']
//     ]),
//     'access_token' => $accessToken
// ];

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($adSetData));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

// $response = curl_exec($ch);
// curl_close($ch);

// echo "Ad Set Response: " . $response;
// exit;


                        // Ad Set Response: {"id":"120223173717300716"}

// **************************** PHP Code to Fix the Ad Set********************************


// $adSetId = '120223173717300716'; // Your Ad Set ID

// $url = "https://graph.facebook.com/v22.0/{$adSetId}";
// $updateData = [
//     'special_ad_categories' => json_encode(['EMPLOYMENT']), // ✅ Fix Special Ad Category
//     'special_ad_category_country' => json_encode(['BD']), // ✅ Set to Bangladesh
//     'targeting' => json_encode([
//         'geo_locations' => ['countries' => ['BD']], // ✅ Change to Bangladesh
//         'custom_audiences' => [] // ✅ No Lookalike Audiences (Required for Special Ad Categories)
//     ]),
//     'access_token' => $accessToken
// ];

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($updateData));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

// $response = curl_exec($ch);
// curl_close($ch);

// echo "Updated Ad Set Response: " . $response;





// *****************************Step 3: Create an Ad Creative********************************
// $url = "https://graph.facebook.com/v22.0/act_{$adAccountId}/adcreatives";

// $creativeData = [
//     'name' => 'WhatsApp Ad Creative',
//     'object_story_spec' => json_encode([
//         'page_id' => '518825357974924',
//         'link_data' => [
//             'name' => 'Botsailor is here',
//             'message' => 'Please Buy Botsailor',
//             'description' => 'Reach audiences everywhere with AI chatbot suite, seamlessly engage on WhatsApp, Facebook Messenger, Instagram DM ,Telegram & Website Chat',
//             'image_hash' => '2018f3d64715c872fde0abb4d823f80c',
//             'link' => 'https://api.whatsapp.com/send',
//             'call_to_action' => [
//                 'type' => 'WHATSAPP_MESSAGE',
//                 'value' => ['app_destination' => 'WHATSAPP']
//             ]
//         ]
//     ]),
//     'access_token' => $accessToken
// ];

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($creativeData));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

// $response = curl_exec($ch);
// curl_close($ch);

// echo "Ad Creative Response: " . $response;
// exit;


// *************************************Ad Creative Response: {"id":"2974774406028088"}




// *****************************Step 4: Create an Ad********************************


// $url = "https://graph.facebook.com/v22.0/act_950843672705150/ads";

// $adData = [
//     'name' => 'WhatsApp Ad',
//     'adset_id' => '120223226360050716',
//     'creative' => json_encode(['creative_id' => '1194382185714745']),
//     'status' => 'ACTIVE',
//     'access_token' => 'EAAg2GW3gyXMBO6aCAaDU8osKBhHJ9RFhePPBVtUkBDQBxtEjynLBfQOIXGrR0TY8qM4e3Hb0VXaqvomzENpxZCHiYtQf3XZBUTtw5VFG3VVqyG24fHgOTxR0lLmzDAyXoPcR5LZBTlZCLGGZCXaAsbEsqcUZCZAR4vGWyqHtZAfZAenoivGpjLpZCh5QZDZD'
// ];

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($adData));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

// $response = curl_exec($ch);
// curl_close($ch);

// echo "Ad Response: " . $response;
// exit;
//************* */ Ad Response: {"id":"6787743885418"}


// *****************************Step 5: Publish the Ad********************************

// $url = "https://graph.facebook.com/v22.0/120223174262630716";

// $publishData = [
//     'status' => 'ACTIVE',
//     'access_token' => $accessToken
// ];

// $response = file_get_contents($url . '?' . http_build_query($publishData));
// echo "Ad Published: " . $response;

// exit;

// Ad Published: {"id":"6738698442018"}


//******************************** */ ✅ Step 1: Verify Ad Status


$adId = '6823379669418'; // Replace with your actual Ad ID

$url = "https://graph.facebook.com/v22.0/{$adId}?fields=status,ad_review_feedback&access_token={$accessToken}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo "<pre>";
print_r(json_decode($response));
exit;


//************************** */ ✅ Step 1: Publish the Ad (Set Status to ACTIVE)
// $adId = '6738698442018'; // Your Ad ID

// $url = "https://graph.facebook.com/v22.0/{$adId}";

// $updateData = [
//     'status' => 'ACTIVE', // Change status to ACTIVE to start running the ad
//     'access_token' => $accessToken
// ];

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($updateData));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

// $response = curl_exec($ch);
// curl_close($ch);

// echo "Ad Publish Response: " . $response;








//************************4️⃣ Resubmit Your Ad for Review
        // Once the campaign and ad set are updated, resubmit your ad.

        // $adId = '6738691639618'; // Your Ad ID

        // $url = "https://graph.facebook.com/v22.0/{$adId}";
        
        // $updateData = [
        //     'status' => 'ACTIVE', // ✅ Change from 'PENDING_REVIEW' to 'ACTIVE'
        //     'access_token' => $accessToken
        // ];
        
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($updateData));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        
        // $response = curl_exec($ch);
        // curl_close($ch);
        
        // echo "Ad Resubmission Response: " . $response;


        // $url = "https://graph.facebook.com/v22.0/6738698442018/insights?fields=impressions,clicks,spend&access_token={$accessToken}";

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $response = curl_exec($ch);
        // curl_close($ch);

        // echo "Ad Insights: " . $response;




        /**************Campaign Insights API */
        // $campaignId = '6807645361818'; // Your campaign ID

        // $url = "https://graph.facebook.com/v22.0/{$campaignId}/insights?fields=impressions,clicks,spend,reach,cpm,cpc,ctr&access_token={$accessToken}";

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $response = curl_exec($ch);
        // curl_close($ch);

        // echo "Campaign Insights: " . $response;
        // echo "<br>";
        




        // **************Ad Set Insights */
        //   $adSetId = '6807646764018'; // Your ad set ID

        //   $url = "https://graph.facebook.com/v22.0/{$adSetId}/insights?fields=impressions,clicks,spend,reach,cpm,cpc,ctr&access_token={$accessToken}";
          
        //   $ch = curl_init();
        //   curl_setopt($ch, CURLOPT_URL, $url);
        //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          
        //   $response = curl_exec($ch);
        //   curl_close($ch);
          
        //   echo "Ad Set Insights: " . $response;
        //   echo "<br>";


        //   Ad insights API
        // $adId = '6807647459618'; // Replace with your real Ad ID

        // $url = "https://graph.facebook.com/v22.0/{$adId}/insights?fields=impressions,clicks,spend,reach,cpm,cpc,ctr&access_token={$accessToken}";

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $response = curl_exec($ch);
        // curl_close($ch);

        // echo "Ad Insights: " . $response;

        

        
          /************** Ad Account Insights */
        // $adAccountId = 'act_55140987'; // Include "act_" prefix

        // $url = "https://graph.facebook.com/v22.0/{$adAccountId}/insights?fields=impressions,clicks,spend,reach,cpm,cpc,ctr&date_preset=this_quarter&access_token={$accessToken}";
        
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // $response = curl_exec($ch);
        // curl_close($ch);
        // echo "<pre>";
        // print_r(json_decode($response, true));



                         // ***** Get Interest Targeting Options *************

        /*********************Search for an Interest by Keyword********** */

        // $searchTerm = 'cooking';

        // $url = "https://graph.facebook.com/v22.0/search?type=adinterest&q=" . urlencode($searchTerm) . "&access_token={$accessToken}";

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $response = curl_exec($ch);
        // curl_close($ch);

        // echo "Interest Search Response:\n";
        // echo "<pre>";
        // print_r(json_decode($response));
        // echo "</pre>";
        // exit;

        /*********************Get Related Interest Suggestions********** */

                // $interestList = json_encode(["Cooking","Cricket"]); // Case-sensitive

                // $url = "https://graph.facebook.com/v22.0/search?type=adinterestsuggestion&interest_list={$interestList}&access_token={$accessToken}";

                // $ch = curl_init();
                // curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // $response = curl_exec($ch);
                // curl_close($ch);

                // echo "Suggested Interests:\n";
                // echo "<pre>";
                // print_r(json_decode($response));
                // echo "</pre>";
                // exit;


        //***************Validate an Interest*******************


        // $interestList = json_encode(["Cooking", "nonexistentinterest"]);

        // $url = "https://graph.facebook.com/v22.0/search?type=adinterestvalid&interest_list={$interestList}&access_token={$accessToken}";

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $response = curl_exec($ch);
        // curl_close($ch);

        // echo "Interest Validation:\n";
        // echo "<pre>";  
        // print_r(json_decode($response));


        
        //***************Browse General Interest Categories*******************


        
        // $url = "https://graph.facebook.com/v22.0/search?type=adTargetingCategory&class=interests&access_token={$accessToken}";

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $response = curl_exec($ch);
        // curl_close($ch);

        // echo "Available Interest Categories:\n" ;
        // echo "<pre>";
        // print_r(json_decode($response));


        //***************Get the country Groups *******************


        // $baseUrl = "https://graph.facebook.com/v21.0/search?type=adgeolocation&location_types=%5B%22country_group%22%5D&q=&limit=1000&access_token={$accessToken}";

        // $allGroups = [];
        // $nextUrl = $baseUrl;
        
        // do {
        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $nextUrl);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     $response = curl_exec($ch);
        //     curl_close($ch);
        
        //     $data = json_decode($response, true);
        
        //     if (!empty($data['data'])) {
        //         foreach ($data['data'] as $group) {
        //             if (isset($group['key'], $group['name'])) {
        //                 $allGroups[] = [
        //                     'key' => $group['key'],
        //                     'name' => $group['name']
        //                 ];
        //             }
        //         }
        //     }
        
        //     $nextUrl = $data['paging']['next'] ?? null;
        
        // } while ($nextUrl);
        
        // // ✅ Final clean array
        // echo "<pre>";
        // print_r($allGroups);
        // echo "</pre>";
        // echo "</pre>";

        // MOBILE_FEED_STANDARD
        // DESKTOP_FEED_STANDARD
        // INSTAGRAM_STANDARD
        // RIGHT_COLUMN_STANDARD

//         $creative_id = '1245137840575134';
//         $access_token = 'EAAg2GW3gyXMBO6aCAaDU8osKBhHJ9RFhePPBVtUkBDQBxtEjynLBfQOIXGrR0TY8qM4e3Hb0VXaqvomzENpxZCHiYtQf3XZBUTtw5VFG3VVqyG24fHgOTxR0lLmzDAyXoPcR5LZBTlZCLGGZCXaAsbEsqcUZCZAR4vGWyqHtZAfZAenoivGpjLpZCh5QZDZD';

//         // === API CALL TO GET PREVIEW HTML ===
//         $api_url = "https://graph.facebook.com/v18.0/{$creative_id}/previews?ad_format=MOBILE_FEED_STANDARD&access_token={$access_token}";

//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $api_url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $response = curl_exec($ch);
//         curl_close($ch);

//         // === PARSE API RESPONSE ===
//         $data = json_decode($response, true);
        
//         // === DISPLAY PREVIEW ===
//         $preview_url = '';
//         $iframe_html = '';

//         if (!empty($data['data'][0]['body']) && is_string($data['data'][0]['body'])) {
//             // Decode escaped HTML (e.g., &amp; => &)
//             $iframe_html = html_entity_decode($data['data'][0]['body']);
        
//             // Extract the src from the iframe HTML
//             if (preg_match('/src="([^"]+)"/', $iframe_html, $matches)) {
//                 $preview_url = $matches[1];
//             }
//         }
// ?>

// <!DOCTYPE html>
// <html>
// <head>
//     <title>Facebook Ad Preview</title>
// </head>
// <body>
//     <h2>Facebook Ad Preview</h2>

//     <?php if ($preview_url): ?>
//         <iframe src="<?= htmlspecialchars($preview_url) ?>" width="360" height="350" style="border:1px solid #ccc;" scrolling="yes"></iframe>
//     <?php else: ?>
//         <p style="color: red;">❌ Unable to load ad preview. Please check your creative ID or access token.</p>
//     <?php endif; ?>
// </body>
// </html>


