<?php
$conn = mysqli_connect("localhost", "root", "", "shopping_cart");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>