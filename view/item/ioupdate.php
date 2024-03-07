<?php
//require_once 'controller/item/ioupdate.php';
if (isset($_GET['item_name'])) {
    $data = urldecode($_GET['item_name']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>show item</title>
    <style>
         main {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">
</head>
<body>
<main>
    <h1>Item Updated</h1>
    <p>Repository updated successfully.</p>
    <p>Go to your item <a href="/show item?item_name=<?php echo $data; ?>">here</a>.</p>
    <p>Click <a href="/main">here</a> to go back to the auction.</p>
</main>
</body>
</html>
