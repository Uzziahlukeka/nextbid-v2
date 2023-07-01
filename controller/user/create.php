<?php
$data = [
    'name' => filter_input(INPUT_POST, "name",),
    'email' => filter_input(INPUT_POST, "email"),
    'passw' => filter_input(INPUT_POST, "password")
];

$apiUrl = "http://localhost/Qwerty/nextbid-auction-website-main/api/user/create.php";

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $apiUrl,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_VERBOSE => true,
    CURLOPT_STDERR => fopen('php://stderr', 'w'),
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    $error = curl_error($ch);
    echo "cURL Error: " . $error;
    exit;
}

$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$datas = json_decode($response, true);

if ($status_code === 422) {
    echo "Invalid data: ";
    print_r($datas["errors"]);
    exit;
}

if ($status_code !== 200) {
    echo "Unexpected status code: $status_code";
    var_dump($datas);
    exit;
}

header("Location: ../../view/user/create.php?name=". urlencode($data['name']));