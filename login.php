<?php
session_start();
include("config.php");

if(isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM customer_details WHERE email_id='$email'";
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){

        $user = mysqli_fetch_assoc($res);

        // ✅ MAIN FIX: dono type password handle karega
        if(password_verify($password, $user['password']) || $password === $user['password']){

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user'] = $user['email_id'];

            header("Location: index.php");
            exit();

        } else {
            echo "<script>alert('Wrong Password');</script>";
        }

    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Spicy Slice - Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    text-decoration: none;
    font-weight: bold;
    color: #ffe0b2;
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
    max-width: 400px;
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

input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
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
}
</style>
</head>

<body>

<?php include("./Component/header.php"); ?>

<div class="container">
<div class="form-box">

<h1>UNIQUE</h1>
<p>Login to continue</p>

<form method="post">
<input type="email" name="email" placeholder="Email Address" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>

</div>
</div>

<footer>
<p>"Discover a world of flavor, crafted with passion and served with a smile."</p>
<p>Fresh flavors, simple ingredients, unforgettable taste.</p>
</footer>

</body>
</html>