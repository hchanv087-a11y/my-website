<!DOCTYPE html>
<html>
<head>
<title>Spicy Slice</title>
<link rel="stylesheet" href="style.css">
<style>
.confirm-box{
text-align:center;
margin-top:100px;
}
.confirm-box h1{
color:green;
font-size:40px;
}
.confirm-box p{
font-size:20px;
margin:20px 0;
}
.button{
background:#ff5722;
color:white;
padding:10px 20px;
text-decoration:none;
border-radius:5px;
}
.order-info{
margin-top:20px;
font-size:16px;
color:#555;
}
.logout-btn{
position:absolute;
top:20px;
right:20px;
background:red;
color:white;
padding:6px 12px;
border:none;
cursor:pointer;
}

/* Responsive Universal Fix */
*{box-sizing:border-box;max-width:100%;}
img{height:auto;display:block;}
@media(max-width:768px){body{overflow-x:hidden;}}
</style>
</head>

<body>

<button class="logout-btn" onclick="logout()">Logout</button>

<div class="confirm-box">
<h1> Order Confirmed!</h1>
<p>Thank you for ordering from UNIQUE </p>
<p>Your delicious food is being prepared </p>

<div class="order-info">
<p>Order ID: <span id="orderId"></span></p>
<p>Order Date: <span id="orderDate"></span></p>
<p>Customer: <span id="customerName"></span></p>
</div>

<a href="home.php" class="button">Back to Home</a>
</div>

<footer>
<p>"Discover a world of flavor, crafted with passion and served with a smile."</p>
<p>:
Bringing delicious recipes from our kitchen to yours.<br>
Fresh flavors, simple ingredients, unforgettable taste.<br>
Cook with passion, serve with love.</p>
</footer>

<script>


if(localStorage.getItem("isLoggedIn") !== "true"){
alert("Please Login First!");
window.location.href="login.php";
}


let orderId = "ORD" + Math.floor(Math.random()*100000);
document.getElementById("orderId").innerText = orderId;


let now = new Date();
document.getElementById("orderDate").innerText = now.toLocaleString();


document.getElementById("customerName").innerText =
localStorage.getItem("userName") || "Customer";


function logout(){
localStorage.removeItem("isLoggedIn");
alert("Logged Out Successfully!");
window.location.href="login.php";
}

</script>

</body>
</html>