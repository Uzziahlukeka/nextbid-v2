<?php 
if (isset($_GET['name'])) {
    $data = urldecode($_GET['name']);
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create user</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">
</head>
<body>
    
    <main>

<h1>WELCOME</h1>

<p> created successfully.
    <p>click on <a href="/main">login</a> to continue</p>
    <p>go to your profil <a href="/show?name=<?php echo $data ; ?>"> go on </a></p>
    
</p>

</main>
</body>
</html>