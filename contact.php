<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Spicy Slice</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
     <?php
    include("./Component/header.php");
    ?>
  
<main class="contact-content">
<h1>Get in Touch</h1>
<p>Have a question or want to give us feedback? We'd love to hear from you!</p>

<form class="contact-form">
<label>Name:</label>
<input type="text" placeholder="Enter your name" required>

<label>Email:</label>
<input type="email" placeholder="Enter your email" required>

<label>Message:</label>
<textarea placeholder="Enter your message" rows="5" required></textarea>

<button type="submit" class="button">Send Message</button>
</form>

<div class="contact-info">
<p>Email: SpicySlice@.com</p>
<p>Phone: +91 12345 67890</p>
<p>Address: 123 Food Street, Delicious City, Ahmedabad, Gujarat, India</p>
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
document.querySelector(".contact-form").addEventListener("submit", function(e){
    e.preventDefault();

    alert("Thank you! Your message has been sent successfully.");

    this.reset();

    window.location.href = "index.php";
});
</script>

</body>
</html>
