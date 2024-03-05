<?php
require_once 'controller/user/show.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Details</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <style>
        main {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #232323;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        dl {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        dt {
            font-weight: bold;
        }

        dd {
            margin-left: 0;
        }

        .card-text {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-button {
            background-color: #28a745; /* Green */
        }

        .auction-button {
            background-color: #007bff; /* Blue */
        }

        .delete-button {
            background-color: #dc3545; /* Red */
        }

        button:hover { 
            opacity: 0.8;
        }

    </style>
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
        <dt>Created </dt>
        <dd><?php echo $datas['create_at'] ?></dd>
    </dl>
    <div class="button-container">
        <a href="edit?name=<?php echo $datas['name']; ?>" class="card-text"><button class="edit-button">Edit</button></a>
        <a href="/main" class="card-text"><button class="auction-button">Auction &gt;</button></a>
        <form method="post" action="/controller/user/delete.php">
            <input type="hidden" name="id" value="<?php echo $datas['id']; ?>">
            <input type="hidden" name="_method" value="delete">
            <button class="delete-button">Delete</button>
        </form>
    </div>
</main>
</body>
</html>
