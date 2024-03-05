<?php
session_start();
// Check if the user is already logged in and the last login time is within 5 minutes
if (isset($_SESSION['last_login_time']) && time() - $_SESSION['last_login_time'] < 300) {
    // Redirect the user to the main page
    header("location:../../main");
    exit();
}

// Check if "Remember Me" checkbox is checked
$remember = isset($_POST['remember']) && $_POST['remember'] == 'on';

if (filter_has_var(INPUT_POST, "sign")) {
    $email = filter_input(INPUT_POST, "email");
    $passw = filter_input(INPUT_POST, "password");

    $data = array(
        'email' => $email,
        'password' => $passw
    );

    $data_json = json_encode($data);

    $api_url = 'http://localhost/Qwerty/nextbid-auction-website-main/api/user/login.php';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return the response instead of outputting it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Decode the JSON response
$response_data = json_decode($response, true);

// Check if login was successful
if(isset($response_data['message']) && $response_data['message'] === 'Login successful') {
    // Login successful, retrieve the user's name
    // $user_name = $response_data['name'];
    // echo "Login successful. Welcome, $user_name!";
    $data = $response_data['name'];
    $eemail=$response_data['email'];
    $_SESSION['data'] = $data;
    $_SESSION['last_login_email'] = $eemail;
    $_SESSION['last_login_time'] = time();


    if ($remember) {
        setcookie('remember_email', $eemail, time() + (60 * 60 * 24 * 5)); // 30 days expiration
        setcookie('remember_pass', $passw, time() + (60 * 60 * 24 * 2)); // 30 days expiration
    } else {
        // If "Remember Me" checkbox is not checked, unset the cookies if they exist
        if (isset($_COOKIE['remember_email'])) {
            setcookie('remember_email', '', time() - 3600); // Set expiration time in the past
        }
        if (isset($_COOKIE['remember_pass'])) {
            setcookie('remember_pass', '', time() - 3600); // Set expiration time in the past
        }
    }

    header("location:../../main");
    exit();


    } else {
    // Login failed
    echo "Login failed. Please check your credentials.";
    echo "<script> alert ('wrong data')</script>";
    echo "<script>setTimeout(function(){ window.location.href = '../../homepage'; }, 100);</script>";
    }
}

