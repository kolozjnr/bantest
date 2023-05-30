<?php
//if(isset($_POST['accno'])){
    // $accno = $_POST['accno'];
    // $code = $_POST['code'];


// Endpoint URL
// $url = 'https://api.flutterwave.com/v3/accounts/resolve';

// // Request data
// $data = array(
//     'account_number' => '0690000032', // Replace with the account number you want to resolve
//     'account_bank' => '044', // Replace with the bank code of the account you want to resolve
//     'seckey' => 'FLWSECK_TEST-c209349e1682a6589316e0e08af2ee18-X' // Replace with your Flutterwave secret key
// );

// // Initialize cURL
// $curl = curl_init();
// $secret_key = 'FLWSECK_TEST-c209349e1682a6589316e0e08af2ee18-X';
// // Set cURL options
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
// 'Authorization: Bearer ' . $secret_key // Set the authorization header with the secret key
// ));
// curl_setopt($curl, CURLOPT_POST, true);
// curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

// // Execute cURL request
// $response = curl_exec($curl);

// // Check for cURL errors
// if(curl_error($curl)){
//     echo 'Error: ' . curl_error($curl);
// } else {
//     // Decode the JSON response
//     $result = json_decode($response, true);
//     // $res = $result->account_name;
//     // echo $res;
    
//     // Check if the request was successful
//     if ($result['status'] == 'success') {
//         // Access the resolved account information from the response
//         $accountDetails = $result['data'];
//         echo 'Account Number: ' . $accountDetails['account_number'] . '<br>';
//         echo 'Account Name: ' . $accountDetails['account_name'] . '<br>';
//         echo 'Bank Code: ' . $accountDetails['bank_code'] . '<br>';
//         echo 'Bank Name: ' . $accountDetails['bank_name'] . '<br>';
//     } else {
//         // Handle error response
//         echo 'Error: ' . $result['message'];
//     }
// }

// // Close cURL
// curl_close($curl);
// //}


?>

<?php
error_reporting(E_ALL);
// echo "we are in";
// die();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jsonData = file_get_contents("php://input");
    $data = json_decode($jsonData, true);
    $accno = $data['accno'];
    $code = $data['code'];

    echo "account is". " ". $accno;

   //die();
// Endpoint URL
$url = 'https://api.flutterwave.com/v3/accounts/resolve';

// Request data
$data = array(
    'account_number' => $accno, //'1472188942', // Replace with the account number you want to resolve
    'account_bank' => urldecode($code) //'044' // Replace with the bank code of the account you want to resolve
);

// Authorization key
$secret_key = 'FLWSECK-617011c04963304b8fb5126bfc3ee459-X'; //'FLWSECK_TEST-c209349e1682a6589316e0e08af2ee18-X'; // Replace with your Flutterwave secret key

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $secret_key // Set the authorization header with the secret key
));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

// Execute cURL request
$response = curl_exec($curl);

// Check for cURL errors
if(curl_error($curl)){
    echo 'Error: ' . curl_error($curl);
} else {
    // Decode the JSON response
    $result = json_decode($response, true);
    
    // Check if the request was successful
    if ($result['status'] == 'success') {
        // Access the resolved account information from the response
        $accountDetails = $result['data'];
        echo 'Account Number: ' . $accountDetails['account_number'] . '<br>';
        echo 'Account Name: ' . $accountDetails['account_name'] . '<br>';
    } else {
        // Handle error response
        echo 'Error: ' . $result['message'];
    }
}

// Close cURL
curl_close($curl);
}
?>

