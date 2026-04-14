<?php
session_start();


if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Cart - UNIQUE</title>
<link rel="stylesheet" href="style.css">
<style>
.cart-box{
max-width:800px;
margin:40px auto;
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 5px 20px rgba(0,0,0,0.1);
}
.cart-item{
display:flex;
justify-content:space-between;
margin-bottom:10px;
}
button{
padding:6px 10px;
background:red;
color:white;
border:none;
cursor:pointer;
}
.total{
font-size:20px;
font-weight:bold;
margin-top:20px;
}
.confirm-btn{
background:green;
margin-top:15px;
padding:10px;
width:100%;
}
.add-more{
margin-top:20px;
display:flex;
gap:10px;
justify-content:center;
}
.add-more a{
text-decoration:none;
}
.add-more button{
background:#333;
}
.clear-btn{
background:#ff5722;
margin-top:10px;
width:100%;
padding:8px;
}
.user-info{
text-align:right;
font-size:14px;
margin-bottom:10px;
}
</style>
</head>

<body>

<?php include("./component/header.php"); ?>

<div class="cart-box">

<div class="user-info">
Welcome, <?php echo $_SESSION['user']; ?>
</div>

<h2>Your Cart</h2>

<div id="cartItems"></div>
<div class="total" id="totalAmount"></div>
<button class="confirm-btn" id="confirmBtn" onclick="confirmOrder()">
Confirm Order
</button>
<button class="clear-btn" onclick="clearCart()">Clear Cart</button>

<div class="add-more">
<a href="burgers.php"><button>Add More Burgers</button></a>
<a href="pizzas.php"><button>Add More Pizzas</button></a>
<a href="soda.php"><button>Add More Cooldrinks</button></a>
</div>

</div>

<script>

let cart = JSON.parse(localStorage.getItem("cart")) || [];
let cartDiv = document.getElementById("cartItems");
let total = 0;


function displayCart(){
cartDiv.innerHTML="";
total=0;

if(cart.length === 0){
cartDiv.innerHTML="<p>Your cart is empty.</p>";
document.getElementById("totalAmount").innerHTML="";
return;
}

cart.forEach((item,index)=>{

let itemTotal = item.price * item.quantity;
total += itemTotal;

cartDiv.innerHTML+=`
<div class="cart-item">
<span>${item.name} (x${item.quantity}) - ₹${itemTotal}</span>
<button onclick="removeItem(${index})">Remove</button>
</div>
`;
});

document.getElementById("totalAmount").innerHTML="Total: ₹"+total;
}


function removeItem(index){
cart.splice(index,1);
localStorage.setItem("cart", JSON.stringify(cart));
displayCart();
}


function clearCart(){
if(confirm("Are you sure you want to clear cart?")){
cart=[];
localStorage.removeItem("cart");
displayCart();
}
}


function addToCart(name, price){

let cart = JSON.parse(localStorage.getItem("cart")) || [];

let existingItem = cart.find(item => item.name === name);

if(existingItem){
    existingItem.quantity += 1;
}else{
    cart.push({
        name: name,
        price: price,
        quantity: 1
    });
}

localStorage.setItem("cart", JSON.stringify(cart));


localStorage.setItem("isBuyNow","false");

window.location.href="cart.php";

document.getElementById("confirmBtn").style.display = "none";

window.location.href = "cart.php";
}

function addToCart(name, price){

let cart = JSON.parse(localStorage.getItem("cart")) || [];

let existingItem = cart.find(item => item.name === name);

if(existingItem){
    existingItem.quantity += 1;
}else{
    cart.push({
        name: name,
        price: price,
        quantity: 1
    });
}

localStorage.setItem("cart", JSON.stringify(cart));

window.location.href = "cart.php";
}


function buyNow(name, price){

let cart = [];

cart.push({
    name: name,
    price: price,
    quantity: 1
});

localStorage.setItem("cart", JSON.stringify(cart));

confirmOrder();
}

displayCart();

</script>

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