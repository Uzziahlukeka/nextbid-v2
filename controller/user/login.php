<?php
session_start();

include_once '../../config/Database.php';
include_once '../../models/Registration.php';

$database = new Database();
$con = $database->connect();

$user = new Registration($con);

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

    if ($user->login($email, $passw)) {
        $data = $user->name;
        $_SESSION['data'] = $data;
        $_SESSION['last_login_email'] = $email;
        $_SESSION['last_login_time'] = time(); // Update last login time

        //session_regenerate_id(true);

        // Set "Remember Me" cookie if checked
        if ($remember) {
            setcookie('remember_email', $email, time() + (60 * 60 * 24 * 5)); // 30 days expiration
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
        echo "<script> alert ('wrong data')</script>";
        echo "<script>setTimeout(function(){ window.location.href = '../../homepage'; }, 100);</script>";
    }
}
?>
