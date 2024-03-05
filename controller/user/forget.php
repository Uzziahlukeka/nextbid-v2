<?php
if (filter_has_var(INPUT_POST, "submit")) {
    $name = filter_input(INPUT_POST, "name");

    $apiUrl = "http://localhost/Qwerty/nextbid-auction-website-main/api/user/read_single.php?name=".urlencode($name);

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

    $datas = json_decode($response, true);

    $to = $datas['email'];
            $subject = "Password Reset";
            $message = "your password has been sent :" .$datas['password'];
            $hearders="from : uzziah luk ";
            // Send the email
            $uzhh=mail($to, $subject, $message,$hearders);
            // Display a success message to the user
            
            if($uzhh==true){

                echo "<script> alert ('password sent')</script>";
                echo "<script>setTimeout(function(){ window.location.href = '../../homepage'; }, 100);</script>";
                exit();
            }
            else{
            echo 'sorry uzh'; 
                }





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

}
