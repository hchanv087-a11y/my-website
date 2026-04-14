<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Spicy Slice</title>
<link rel="stylesheet" href="style.css">
<style>
.user-info{
text-align:right;
padding:10px 20px;
font-size:14px;
}
.logout-btn{
background:red;
color:white;
padding:5px 10px;
border:none;
cursor:pointer;
margin-left:10px;
}
/* Responsive Universal Fix */
*{box-sizing:border-box;max-width:100%;}
img{height:auto;display:block;}
@media(max-width:768px){body{overflow-x:hidden;}}
</style>
</head>
<body>

<?php include("./Component/header.php"); ?>

<main class="menu-section">
<h1>Our Delicious Burgers</h1>
<div class="menu-grid">

<div class="menu-item">
<img src="images/download.jpeg">
<h2>Classic Cheese Burger</h2>
<p>Juicy patty with cheese.</p>
<span class="price">₹199</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>

<div class="menu-item">
<img src="images/download (1).jpeg">
<h2>Cheese Burger</h2>
<p>Grilled spicy chicken.</p>
<span class="price">₹229</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>

<div class="menu-item">
<img src="images/download (2).jpeg">
<h2>Veggie Delight Burger</h2>
<p>Fresh veggie patty.</p>
<span class="price">₹179</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>

<div class="menu-item">
<img src="images\download (9).jpeg">
<h2>Veg Mile</h2>
<p>Veg Mile</p>
<span class="price">₹197</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>


<div class="menu-item">
<img src="images\download (11).jpeg">
<h2>Veg Burger</h2>
<p>Veg Burger</p>
<span class="price">₹199</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>


<div class="menu-item">
<img src=" images\download (10).jpeg">
<h2>Burger</h2>
<p>Fresh veggie patty.</p>
<span class="price">₹250</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>


</div>
</main>

<footer>
        <p>"Discover a world of flavor, crafted with passion and served with a smile."</p>
        <p>:

 Bringing delicious recipes from our kitchen to yours.<br>

Fresh flavors, simple ingredients, unforgettable taste.<br>

Cook with passion, serve with love.</p>
    </footer>
<script>

let isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
document.querySelectorAll(".add-to-cart").forEach(function(button){

button.addEventListener("click", function(){

if(!isLoggedIn){
alert("Please Register or Login First!");
window.location.href="registrasion.php";
return;
}

let menuItem = this.parentElement;

let name = menuItem.querySelector("h2").innerText;
let priceText = menuItem.querySelector(".price").innerText;
let price = parseInt(priceText.replace("₹",""));

let cart = JSON.parse(localStorage.getItem("cart")) || [];

let existingItem = cart.find(item => item.name === name);

if(existingItem){
existingItem.quantity += 1;
}else{
cart.push({name:name, price:price, quantity:1});
}

localStorage.setItem("cart", JSON.stringify(cart));
localStorage.setItem("orderMode","cart");

window.location.href="cart.php";

});

});


document.querySelectorAll(".buy-now").forEach(function(button){

button.addEventListener("click", function(){

if(!isLoggedIn){
alert("Please Register or Login First!");
window.location.href="registrasion.php";
return;
}

let menuItem = this.parentElement;

let name = menuItem.querySelector("h2").innerText;
let priceText = menuItem.querySelector(".price").innerText;
let price = parseInt(priceText.replace("₹",""));

let cart = [];
cart.push({name:name, price:price, quantity:1});

localStorage.setItem("cart", JSON.stringify(cart));
localStorage.setItem("orderMode","buy");

window.location.href="cart.php";

});

});
    
</script>

</body>
</html>