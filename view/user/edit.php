<?php 
require_once 'controller/user/edit.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Client</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">
</head>
<body>
    
    <main>

<h1>User Details</h1>

<form method="post" action="../../controller/user/update.php">
        
        <input type="hidden" name="id" value="<?= $data["id"] ?>">
        
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $data["name"] ?>">
        
        <label for="email">email</label>
        <textarea name="email" id="email"><?= htmlspecialchars($data["email"]) ?></textarea>
        
        <button>Submit</button>
    </form>
</main>
</body>
</html>
