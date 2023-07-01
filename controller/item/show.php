<?php
session_start();
if (isset($_SESSION['bid'])) {
    unset($_SESSION['bid']);
}

$name = $_GET['item_name'];

$apiUrl = "http://localhost/Qwerty/nextbid-auction-website-main/api/items/read_single.php?item_name=".urlencode($name);
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $apiUrl,
    CURLOPT_VERBOSE => true,
    CURLOPT_STDERR => fopen('php://stderr', 'w'),
]);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);
$data = json_decode($response, true);
if ($status_code === 422) {
    echo "Invalid data: ";
    print_r($data["errors"]);
    exit;
}
if ($status_code !== 200) {
    echo "Unexpected status code: $status_code";
    var_dump($data);
    exit;
}
 if (isset($_POST['bid'])) {
     $bid = $_POST['bid'];
     $_SESSION['bid'] = $bid;
 }
 $_SESSION['item_name']=$data['item_name'];

