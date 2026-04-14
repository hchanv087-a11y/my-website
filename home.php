<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>

<title>Spicy Slice</title>
<link rel="stylesheet" href="style.css">

<style>
.products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    padding: 40px;
    max-width: 1100px;
    margin: auto;
}

.product-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    text-align: center;
    padding: 20px;
    transition: 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 15px;
}

.product-card h3 {
    margin-bottom: 10px;
}

.price {
    color: #e64a19;
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 5px;
}

.rating {
    color: gold;
    margin-bottom: 10px;
}

.order-btn {
    background-color: #ff5722;
    color: white;
    padding: 8px 15px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    cursor:pointer;
}

/* Responsive Universal Fix */
*{box-sizing:border-box;max-width:100%;}
img{height:auto;display:block;}
@media(max-width:768px){body{overflow-x:hidden;}}
</style>

</head>
<body>

 <?php
    include("./Component/header.php");
    ?>
  
<section class="products">

<div class="product-card">
<img src="images/download (1).jpeg" alt="Burger">
<h3>Cheese Burger</h3>
<div class="price">₹199</div>
<div class="rating">⭐⭐⭐⭐☆ (4.5)</div>
</div>

<div class="product-card">
<img src="images/download (14).jpeg" alt="Pizza">
<h3>Margherita Pizza</h3>
<div class="price">₹299</div>
<div class="rating">⭐⭐⭐⭐⭐ (5.0)</div>
</div>

<div class="product-card">
<img src="images/download (17).jpeg" alt="Cold Drink">
<h3>Cold Drink</h3>
<div class="price">₹20</div>
<div class="rating">⭐⭐⭐⭐☆ (4.2)</div>
</div>

<div class="product-card">
<img src="images/download (16).jpeg" alt="Drink">
<h3>Cold Drink</h3>
<div class="price">₹80</div>
<div class="rating">⭐⭐⭐⭐☆ (4.5)</div>
</div>

<div class="product-card">
<img src="images/download (4).jpeg" alt="Pizza">
<h3>Vegitable Pizza</h3>
<div class="price">₹299</div>
<div class="rating">⭐⭐⭐⭐☆ (4.5)</div>
</div>

<div class="product-card">
<img src="images/download.jpeg" alt="Burger">
<h3>Cheese Burger</h3>
<div class="price">₹199</div>
<div class="rating">⭐⭐⭐⭐☆ (4.5)</div>
</div>

<div class="product-card">
<img src="images/download (8).jpeg" alt="Drink">
<h3>Cold Drink</h3>
<div class="price">₹20</div>
<div class="rating">⭐⭐⭐⭐☆ (4.5)</div>
</div>

<div class="product-card">
<img src="images/download (13).jpeg" alt="Pizza">
<h3>Mayonnaise Pizza</h3>
<div class="price">₹250</div>
<div class="rating">⭐⭐⭐⭐☆ (4.5)</div>
</div>

</section>

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