<?php
session_start();
include_once '../../config/Database.php';
include_once '../../models/Registration.php';

$database=new Database();
$con=$database->connect();

$user= new Registration($con);

if (filter_has_var(INPUT_POST, "sign")) {
    $email = filter_input(INPUT_POST, "email");
    $passw = filter_input(INPUT_POST, "password");

    if($user->login($email,$passw)==true){
        $data=$user->name;
        $_SESSION['data']=$data;
        header("location:../../view/logedin.php");
        exit();
    }else{
        echo"error";
    }
}
?>
