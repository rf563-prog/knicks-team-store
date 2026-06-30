<?php
session_start();

if (empty($_SESSION["cart"])) {
    header("Location: index.php");
    exit();
}

$customer_name = $_POST["customer_name"];
$customer_email = $_POST["customer_email"];

$total = 0;
$order_details = "";

foreach ($_SESSION["cart"] as $item) {
    $order_details .= $item["name"] . " - $" . number_format($item["price"], 2) . "\n";
    $total += $item["price"];
}

$message = "New Knicks Store Order\n\n";
$message .= "Customer Name: " . $customer_name . "\n";
$message .= "Customer Email: " . $customer_email . "\n\n";
$message .= "Items Ordered:\n";
$message .= $order_details;
$message .= "\nTotal: $" . number_format($total, 2);

$to = "rfigueroa91079@gmail.com";
$subject = "New Knicks Store Order";

mail($to, $subject, $message);

session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed</title>

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
            width:500px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0px 4px 10px rgba(0,0,0,.15);
            text-align:center;
        }

        h2{
            color:#006BB6;
        }

        .button{
            background:#F58426;
            color:white;
            padding:12px 20px;
            text-decoration:none;
            border-radius:8px;
            display:inline-block;
            margin-top:20px;
        }

        .button:hover{
            background:#d66c17;
        }
    </style>
</head>

<body>

<header>
    <h1>🏀 New York Knicks Team Store 🏀</h1>
</header>

<div class="container">
    <h2>Thank you for your order!</h2>

    <p>Your Knicks merchandise order has been submitted.</p>
    <p>A confirmation email was sent to the store owner.</p>

    <a class="button" href="index.php">Back to Store</a>
</div>

</body>
</html>