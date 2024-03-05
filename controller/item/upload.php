<?php

session_start();

$name = isset($_SESSION['data']) ? $_SESSION['data'] : null;
$name = $_SESSION['data'];


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit('POST request method required');
}

if (empty($_FILES)) {
    exit('No file was uploaded');
}

// Validate file upload errors
if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
    exit('Error uploading file');
}

// Set a limit for the file size (50MB)
$maxFileSize = 50 * 1024 * 1024; // 50MB in bytes

if ($_FILES["image"]["size"] > $maxFileSize) {
    exit('File too large (max 50MB)');
}

// Validate the file's MIME type
$allowedMimeTypes = ["image/gif", "image/png", "image/jpeg"];

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_file($finfo, $_FILES["image"]["tmp_name"]);
finfo_close($finfo);

if (!in_array($mime_type, $allowedMimeTypes)) {
    exit("Invalid file type");
}

$filename = $_FILES["image"]["name"];
$destination = __DIR__ . "../../../images/" . $filename;

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
    exit("Can't move uploaded file");
}

// Prepare data for the API request
$data = [
    'item_name' => filter_input(INPUT_POST, "item-name",),
    'item_photo' => $filename,
    'item_description' => filter_input(INPUT_POST, "item-description"),
    'item_price' => filter_input(INPUT_POST, "amount", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
    'user_id'=>$name
];

$apiUrl = "http://localhost/Qwerty/nextbid-auction-website-main/api/items/create.php";

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


header("Location: ../../upload?item_name=" . urlencode($data['item_name']));
exit();

