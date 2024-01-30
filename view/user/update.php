<?php 
if (isset($_GET['name'])) {
    $data = urldecode($_GET['name']);
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>update Client</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">
</head>
<body>
    
    <main>

<h1>user updated</h1>

<p>Repository updated successfully.
<p>votre profil
 <a href="/show?name=<?php echo $data?>">Show</a>
 </p>
</p>
 <p>click on <a href="/main">auction</a> to continue</p>
 </main>
</body>
</html>