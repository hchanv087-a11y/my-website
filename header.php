<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<header>
<nav>
<div class="logo">Spicy Slice</div>
<ul>

<li><a href="home.php">Home</a></li>
<li><a href="about.php">About Us</a></li>
<li><a href="contact.php">Contact</a></li>
<li><a href="burgers.php">Burgers</a></li>
<li><a href="pizzas.php">Pizzas</a></li>
<li><a href="soda.php">ColdDrinks</a></li>




<?php if(isset($_SESSION['user'])){ ?>
    
    
    <li><a href="logout.php">Logout</a></li>

<?php } else { ?>

    
    <li><a href="login.php">Login</a></li>
    <li><a href="registrasion.php">Registration</a></li>

<?php } ?>

</ul>
</nav>
</header>