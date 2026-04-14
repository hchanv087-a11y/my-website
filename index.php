<!DOCTYPE html>
<html lang="en">
<head>

<title>Spicy Slice</title>
<link rel="stylesheet" href="style.css">

<style>

    /* Responsive Universal Fix */
*{box-sizing:border-box;max-width:100%;}
img{height:auto;display:block;}
@media(max-width:768px){body{overflow-x:hidden;}}
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
}
</style>

</head>
<body>

 <?php
    include("./Component/header.php");
    ?>
  
<main class="home-hero">
<h1>Welcome to UNIQUE!</h1>
<p>Your one-stop shop for delicious burgers, pizzas, and refreshing sodas.</p>
<a href="burgers.php" class="button">Order Now!</a>
</main>




<footer>
    <p>"Discover a world of flavor, crafted with passion and served with a smile."</p>
        <p>:

 Bringing delicious recipes from our kitchen to yours.<br>

Fresh flavors, simple ingredients, unforgettable taste.<br>

Cook with passion, serve with love.</p>
    
</footer>

</body>
</html>
