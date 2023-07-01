<?php
$ch = curl_init();
$data = [
    'id' => filter_input(INPUT_POST, "id"),
    'name' => filter_input(INPUT_POST, "name"),
    'email' => filter_input(INPUT_POST, "email")
];
curl_setopt($ch, CURLOPT_URL, "http://localhost/Qwerty/nextbid-auction-website-main/api/user/update.php");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

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
header("Location: ../../view/user/update.php?name=". urlencode($data['name']));