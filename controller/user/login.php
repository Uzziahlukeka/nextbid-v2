<?php
include_once '../nextbid-auction-website-main/config/Database.php';
include_once '../nextbid-auction-website-main/models/Registration.php';

$database=new Database();
$con=$database->connect();

$user= new Registration($con);

if (filter_has_var(INPUT_POST, "sign")) {
    $email = filter_input(INPUT_POST, "email");
    $passw = filter_input(INPUT_POST, "password");

    if($user->login($email,$passw)==true){
        header("location:logedin.php");
        exit();
    }else{
        echo"error";
    }
}
?>
