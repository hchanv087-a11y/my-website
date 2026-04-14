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
</head>
<body>

<?php include("./Component/header.php"); ?>

<main class="menu-section">
<h1>Our Handcrafted Pizzas</h1>
<div class="menu-grid">

<div class="menu-item">
<img src="images/download (3).jpeg">
<h2>Classic Margherita</h2>
<span class="price">₹249</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>

<div class="menu-item">
<img src="images/download (4).jpeg">
<h2>Veggie Supreme</h2>
<span class="price">₹299</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>

<div class="menu-item">
<img src="images/download (5).jpeg">
<h2>Paneer Tikka Pizza</h2>
<span class="price">₹329</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>

<div class="menu-item">
<img src="images/download (12).jpeg">
<h2>Vegetable Pizza</h2>
<span class="price">₹350</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>

<div class="menu-item">
<img src="images/download (13).jpeg">
<h2>2X Cheese Pizza</h2>
<span class="price">₹400</span>
<button class="add-to-cart">Add to Cart</button>
<button class="buy-now">Buy Now</button>
</div>

<div class="menu-item">
<img src="images/download (14).jpeg">
<h2>Corn Pizza</h2>
<span class="price">₹200</span>
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

window.location.href = "cart.php";

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

window.location.href = "cart.php";

});

});

</script>

</body>
</html>