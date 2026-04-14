<?php
$conn = mysqli_connect("localhost", "root", "", "spicy_slice_db"); // Yahan spicy_slice_db hona chahiye

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>