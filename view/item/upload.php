<?php
if (isset($_GET['item_name'])) {
    $data = urldecode($_GET['item_name']);
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>upload file</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">
</head>
<body>
    <main>

<h1>WELCOME</h1>

<p> created successfully.
    <p>click on <a href="/main">auction</a> to continue</p>
    <p>go to your item <a href="/show item?item_name=<?php echo $data ; ?>"> go on </a></p>
    
</p>

</main>
</body>
</html>