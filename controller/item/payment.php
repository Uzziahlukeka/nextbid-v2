<?php
if (isset($_POST['pay'])) {
    if (isset($_SESSION['bid'])) {
        $bidValue = $_SESSION['bid'];
        $_SESSION['bid'] = $bidValue;

        header('location:../../pay');

    } else {
        ?>
        <script> alert('Bid value not found in the form.');</script>
        <a href="../../main" style="height: auto;"> back </a>
        <?php
        echo "Bid value not found in the form.";
        exit;
    }
}
?>


