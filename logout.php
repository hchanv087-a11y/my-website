<?php
session_start();


if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}


if(isset($_POST['logout'])){
    session_destroy();
    header("Location: registrasion.php");
    exit();
}

$userEmail = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Spicy Slice</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

    /* Responsive Universal Fix */
*{box-sizing:border-box;max-width:100%;}
img{height:auto;display:block;}
@media(max-width:768px){body{overflow-x:hidden;}}

* { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
body { background: #f4f4f4; min-height: 100vh; }

header { background: #ff5722; padding: 15px 0; }
nav { max-width: 1200px; margin: auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; }
.logo { color: white; font-size: 1.8rem; font-weight: bold; }
nav ul { list-style: none; display: flex; }
nav ul li { margin-left: 20px; }
nav ul li a { text-decoration: none; font-weight: bold; color: #ffcc80; }

.container { display: flex; justify-content: center; align-items: center; padding: 60px 15px; }

.message-box {
    background: white;
    padding: 40px;
    width: 100%;
    max-width: 500px;
    border-radius: 12px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.25);
    text-align: center;
}

.message-box h1 {
    color: #dd2476;
    margin-bottom: 15px;
}

.message-box p {
    margin-bottom: 20px;
    color: #666;
}

button {
    padding: 10px 20px;
    background: #ff512f;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 6px;
    cursor: pointer;
}

footer {
    text-align: center;
    padding: 20px;
    background-color: #333;
    color: white;
    margin-top: 40px;
}
</style>
</head>

<body>

 <?php
    include("./Component/header.php");
    ?>
  
<div class="container">
<div class="message-box">

<h1>Confirm Logout</h1>

<p>
Is this your account?<br><br>
<strong><?php echo $userEmail; ?></strong>
</p>

<form method="post">
<button type="submit" name="logout">Yes, Logout</button>
</form>

</div>
</div>

<footer>
<p>"Discover a world of flavor, crafted with passion and served with a smile."</p>
<p>
Bringing delicious recipes from our kitchen to yours.<br>
Fresh flavors, simple ingredients, unforgettable taste.<br>
Cook with passion, serve with love.
</p>
</footer>

</body>
</html> 