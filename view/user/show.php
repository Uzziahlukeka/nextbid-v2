<?php
require_once '../../controller/user/show.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Example REST API Client</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">
</head>
<body>
    
    <main>

<h1>User Details</h1>
<dl>
    <dt>ID</dt>
    <dd><?php echo $datas['id']; ?></dd>
    <dt>Name</dt>
    <dd><?php echo $datas['name']; ?></dd>
    <dt>Email</dt>
    <dd><?php echo htmlspecialchars($datas['email']); ?></dd>
</dl>
<a href="edit.php?name=<?php echo $datas['name']; ?>" class="card-text card-text-2"> < Edit</a>
<br>
<a href="/view/logedin.php" class="card-text card-text-2">Auction > </a>

<form method="post" action="/controller/user/delete.php">
    <input type="hidden" name="id" value="<?php echo $datas['id']; ?>">
    <button>Delete</button>
</form>

</main>
</body>
</html>
