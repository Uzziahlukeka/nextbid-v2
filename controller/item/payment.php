<?php
session_start();
if (isset($_POST['pay'])) {
    if (isset($_POST['bidd'])) {
        // Retrieve the bid value from the form
        $bidValue = $_POST['bidd'];
        
        // Store the bid value in the session
        $_SESSION['bid'] = $bidValue;

        // Redirect to the payment page
        header('Location: ../../pay');
        exit;
    } else {
        // Handle the case where bid value is not found in the form
        echo "<script>alert('Bid value not found in the form.');</script>";
        echo "<a href='../../main' style='height: auto;'>Back</a>";
        exit;
    }
}
