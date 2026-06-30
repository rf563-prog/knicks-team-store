<?php
session_start();

if (empty($_SESSION["cart"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f8;
            margin:0;
        }

        header{
            background:#006BB6;
            color:white;
            text-align:center;
            padding:30px;
        }

        .container{
            width:400px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0px 4px 10px rgba(0,0,0,.15);
        }

        input{
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:8px;
        }

        .button{
            background:#F58426;
            color:white;
            border:none;
            cursor:pointer;
            font-size:16px;
        }

        .button:hover{
            background:#d66c17;
        }

        a{
            color:#006BB6;
            text-decoration:none;
        }
    </style>
</head>

<body>

<header>
    <h1>Checkout</h1>
    <p>Complete your Knicks order</p>
</header>

<div class="container">

    <form method="post" action="confirm.php">
        <label>Your Name:</label>
        <input type="text" name="customer_name" required>

        <label>Your Email:</label>
        <input type="email" name="customer_email" required>

        <input type="submit" class="button" value="Buy Now">
    </form>

    <br>
    <a href="cart.php">Back to Cart</a>

</div>

</body>
</html>