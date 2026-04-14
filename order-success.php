<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}


$order_id = "ORD" . rand(1000,9999);
?>
<!DOCTYPE html>
<html>
<head>
<title>Spicy Slice</title>
<link rel="stylesheet" href="style.css">
<style>

/* Responsive Universal Fix */
*{box-sizing:border-box;max-width:100%;}
img{height:auto;display:block;}
@media(max-width:768px){body{overflow-x:hidden;}}

.success-box{
max-width:600px;
margin:60px auto;
background:white;
padding:30px;
border-radius:10px;
text-align:center;
box-shadow:0 5px 20px rgba(0,0,0,0.1);
}
.success-box h2{
color:green;
margin-bottom:15px;
}
.success-box p{
margin:10px 0;
}
.success-box button{
margin-top:15px;
padding:10px 20px;
border:none;
background:#ff5722;
color:white;
cursor:pointer;
border-radius:5px;
}
</style>
</head>
<body>

<div class="success-box">
<h2> Order Confirmed Successfully!</h2>
<p>Thank you, <b><?php echo $_SESSION['user']; ?></b></p>
<p>Your Order ID: <b><?php echo $order_id; ?></b></p>
<p>We are preparing your delicious food </p>

<a href="home.php"><button>Back to Home</button></a>
<a href="burgers.php"><button>Continue Shopping</button></a>
</div>

</body>
</html>