<?php
//session_start();
require_once "controller/item/ishow.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="icon" href="/icons/Main Logo.svg">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/styles/inner-card.css">
    <title>Nextbid - Auction Website</title>
</head>

<body>


    <section class="card-content">
        <div class="wrapper cards">
            <!-- ............................................................................ -->
            <div class="back-button">
                <a href="/main"><i class="fa-solid fa-arrow-left fa-lg" style="color: #3b3b3b;"></i>  Back</a>
            </div>
            <div class="card auction-card">
                <div class="auction-card-img">
                    <a href="#"><img src="/images/<?php echo $data['item_photo']?>" alt="Product Image"></a>
                </div>
                <div class="card-details">
                    <div class="like-icon-num">
                        <a class="like-button">
                            <i class="fa-regular fa-heart fa-lg like1-icon" style="color: #000000;"></i>
                            <i class="fa-solid fa-heart fa-lg" style="color: #f92a2a;"></i>
                        </a>
                        <span class="like-count">0</span>
                    </div>

                    <!-- Title -->
                    <div>
                        <label class="one-label" for="title">Title</label>
                        <h3 class="card-title">
                        <?php echo $data['item_name']?>
                        </h3>
                    </div>

                    <!-- Description -->
                    <div class="description">
                        <label class="one-label" for="description">Description</label>
                        <p><?php echo $data['item_description']?>
                        </p>
                    </div>
                    <div class="current-price-p">
                        <div class="stroke"></div>
                        <p class="card-text card-text-2">Your bid:<span class="current-price current-bid">$<?php  isset($_SESSION['bid']) ? $_SESSION['bid'] : '0'; ?></span></p>
                        <p class="card-text">Last bid: <span class="current-price last-bid"><?php echo $data['item_price']?></span></p>
                    </div>
                    <p class="card-text-last card-text-1">Ends in: <span
                            class="closing-time">2023-04-11T08:00:00Z</span></p>
                    
                            <div class="card-bid">
                           <div class="bid-container">
                                <input type="number" class="bid-input" placeholder="Offer a price" name="bid">
                                <button onclick="bid(this.closest('.auction-card'))">Bid now</button>
                           </div>

                           <form method="post" action="/controller/item/payment.php">
                            <input type=hidden value="<?php echo isset($_SESSION['bidd']) ?>" name='bidd'>
                            <button type="submit" name='pay'>Pay</button>
                           </form>
                        </div>
                        
                    <p class="card-text-last card-text">Ends in:<span id="timer" class="countdown-timer"></span></p>
                    <form method="post" action="/controller/item/delete.php" ">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="item_name" value="<?= $data["item_name"] ?>">
                    <button class="delete-button">Delete</button>
                    </form>

                    <!-- <a href="update item?item_name=<?= $data["item_name"] ?> " class="card-text"><button class="edit-button">Edit</button></a> -->

                    <form method="get" action="update item" class="edit-button">
                    <!-- <input type="hidden" name="_method" value="PUT"> -->
                    <input type="hidden" name="item_name" value="<?php echo $data["item_name"] ; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $data["user_id"]; ?>">
                    <button class="edit-button">edit</button>
                    </form>
              <!--<a href="iupdate.php?item_name=<?= $data["item_name"] ?>">Edit</a>--> 
                </div>
                
            </div>
        </div>
        
    </section>
</script>
    <script src="/js/script.js"></script>
    <script src="/js/bid.js"></script>
    <script src="/js/like-counter.js"></script>

</body>
</html>
