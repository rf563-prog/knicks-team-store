<?php
session_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = array(
        "id" => $_POST["id"],
        "name" => $_POST["name"],
        "price" => $_POST["price"]
    );

    $_SESSION["cart"][] = $item;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>

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
            width:80%;
            margin:30px auto;
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0px 4px 10px rgba(0,0,0,.15);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#F58426;
            color:white;
            padding:12px;
        }

        td{
            padding:12px;
            border-bottom:1px solid #ddd;
            text-align:center;
        }

        .total{
            text-align:right;
            font-size:24px;
            font-weight:bold;
            margin-top:20px;
            color:#006BB6;
        }

        .button{
            background:#006BB6;
            color:white;
            padding:12px 20px;
            text-decoration:none;
            border-radius:8px;
            margin-right:10px;
            display:inline-block;
        }

        .button:hover{
            background:#004f8f;
        }

        .checkout{
            background:#F58426;
        }

        .checkout:hover{
            background:#d66c17;
        }
    </style>
</head>

<body>

<header>
    <h1>🏀 Your Knicks Shopping Cart 🏀</h1>
</header>

<div class="container">

<?php
$total = 0;

if (empty($_SESSION["cart"])) {
    echo "<h2>Your cart is empty.</h2>";
} else {
    echo "<table>";
    echo "<tr><th>Product</th><th>Price</th></tr>";

    foreach ($_SESSION["cart"] as $item) {
        echo "<tr>";
        echo "<td>" . $item["name"] . "</td>";
        echo "<td>$" . number_format($item["price"], 2) . "</td>";
        echo "</tr>";

        $total += $item["price"];
    }

    echo "</table>";
    echo "<div class='total'>Total: $" . number_format($total, 2) . "</div>";
}
?>

<br><br>

<a class="button" href="index.php">Continue Shopping</a>

<?php if (!empty($_SESSION["cart"])) { ?>
    <a class="button checkout" href="checkout.php">Checkout</a>
<?php } ?>

</div>

</body>
</html>