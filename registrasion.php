<?php
session_start();
include("config.php");

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $check = mysqli_query($conn, "SELECT * FROM customer_details WHERE email_id='$email'");

    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Email already registered! Please login.'); window.location='login.php';</script>";
        exit();
    }

    $sql = "INSERT INTO customer_details (full_name, email_id, password, phone_no, gender, address)
            VALUES ('$name', '$email', '$password', '$phone', '$gender', '$address')";

    if(mysqli_query($conn, $sql)){

        
        echo "<script>alert('Registration Successful! Please Login'); window.location='login.php';</script>";
        exit();

    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Spicy Slice - Register</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    background: linear-gradient(135deg, #ff512f, #dd7124);
    min-height: 100vh;
}

header {
    background: rgba(0,0,0,0.2);
    backdrop-filter: blur(10px);
}

nav {
    max-width: 1200px;
    margin: auto;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    color: white;
    font-size: 1.8rem;
    font-weight: bold;
}

nav ul {
    list-style: none;
    display: flex;
    align-items: center;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #ffe0b2;
    font-weight: bold;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 15px;
}

.form-box {
    background: white;
    padding: 35px;
    width: 100%;
    max-width: 420px;
    border-radius: 15px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.3);
}

.form-box h1 {
    text-align: center;
    color: #ff512f;
    margin-bottom: 10px;
}

.form-box p {
    text-align: center;
    margin-bottom: 20px;
    color: #777;
}

input, textarea, select {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

input:focus, textarea:focus {
    border-color: #ff512f;
    outline: none;
    box-shadow: 0 0 5px rgba(255,81,47,0.5);
}

.row {
    display: flex;
    gap: 10px;
}

.gender {
    display: flex;
    justify-content: space-around;
    margin-bottom: 15px;
    font-size: 14px;
}

button {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #ff512f, #dd7424);
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
}

button:hover {
    opacity: 0.9;
}

footer {
    text-align: center;
    padding: 20px;
    color: white;
    margin-top: 20px;
    font-size: 14px;
}

.error-msg {
    color: red;
    text-align: center;
    margin-bottom: 10px;
}
</style>
</head>

<body>

<?php include("./Component/header.php"); ?>

<div class="container">
<div class="form-box">

<h1>Spicy Slice</h1>
<p>Register & enjoy delicious food</p>

<?php if($message != "") { echo "<p class='error-msg'>$message</p>"; } ?>

<form method="post" action="registrasion.php">

<input type="text" name="fullname" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email Address" required>

<div class="row">
<input type="password" name="password" placeholder="Password" required>
</div>

<div class="gender">
    <label><input type="radio" name="gender" value="Male" required> Male</label>
    <label><input type="radio" name="gender" value="Female"> Female</label>
</div>

<input type="tel" name="phone" placeholder="Phone Number" required>
<textarea name="address" rows="3" placeholder="Address" required></textarea>

<button type="submit" name="register">Register</button>

</form>

</div>
</div>

<footer>
<p>"Discover a world of flavor, crafted with passion and served with a smile."</p>
<p>Fresh flavors, simple ingredients, unforgettable taste.</p>
</footer>

</body>
</html>