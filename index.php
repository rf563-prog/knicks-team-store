<?php
session_start();
include("connect.php");

$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>New York Knicks Team Store</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            background:#f4f6f8;
            margin:0;
            padding:0;
        }

        .banner{
            width:100%;
            max-height:350px;
            object-fit:cover;
            display:block;
        }

        header{
            background:#006BB6;
            color:white;
            text-align:center;
            padding:25px;
        }

        header h1{
            margin:0;
            font-size:40px;
        }

        header p{
            margin-top:10px;
            font-size:18px;
        }

        .container{
            width:90%;
            margin:30px auto;
        }

        .products{
            display:flex;
            flex-wrap:wrap;
            justify-content:center;
            gap:25px;
        }

        .card{
            background:white;
            width:260px;
            padding:15px;
            border-radius:12px;
            box-shadow:0px 4px 12px rgba(0,0,0,.15);
            text-align:center;
        }

        .card img{
            width:200px;
            height:200px;
            object-fit:cover;
            border-radius:10px;
        }

        .price{
            font-size:24px;
            font-weight:bold;
            color:#F58426;
        }

        .instock{
            color:green;
            font-weight:bold;
        }

        .outstock{
            color:red;
            font-weight:bold;
        }

        .button{
            background:#F58426;
            color:white;
            border:none;
            padding:12px 18px;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
        }

        .button:hover{
            background:#d66c17;
        }

        .cartlink{
            text-align:center;
            margin-top:40px;
        }

        .cartlink a{
            background:#006BB6;
            color:white;
            text-decoration:none;
            padding:15px 25px;
            border-radius:8px;
            font-size:18px;
        }

    </style>
</head>

<body>

<img src="images/banner.jpg" class="banner">

<header>
    <h1>🏀 New York Knicks Team Store 🏀</h1>
    <p>Official Fan Merchandise</p>
</header>

<div class="container">

    <div class="products">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <div class="card">

            <img src="images/<?php echo $row['Image']; ?>">

            <h3><?php echo $row["Name"]; ?></h3>

            <p class="price">
                $<?php echo number_format($row["Price"],2); ?>
            </p>

            <?php if($row["Availability"] == "In Stock") { ?>

                <p class="instock">
                    In Stock
                </p>

                <form method="post" action="cart.php">

                    <input
                        type="hidden"
                        name="id"
                        value="<?php echo $row['ID']; ?>">

                    <input
                        type="hidden"
                        name="name"
                        value="<?php echo $row['Name']; ?>">

                    <input
                        type="hidden"
                        name="price"
                        value="<?php echo $row['Price']; ?>">

                    <input
                        type="submit"
                        class="button"
                        value="Add To Cart">

                </form>

            <?php } else { ?>

                <p class="outstock">
                    Out Of Stock
                </p>

            <?php } ?>

        </div>

        <?php } ?>

    </div>

    <div class="cartlink">
        <a href="cart.php">🛒 View Shopping Cart</a>
    </div>

</div>

</body>
</html>