<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php"); exit();
}

$u_id = $_SESSION['user_id'];

// ✅ correct table name
$u_res = mysqli_query($conn, "SELECT * FROM customer_details WHERE user_id='$u_id'");
$u_data = mysqli_fetch_assoc($u_res);

if(isset($_POST['place_order'])){
    $items = mysqli_real_escape_string($conn, $_POST['food_items']);
    $total = mysqli_real_escape_string($conn, $_POST['total_bill']);
    
    // ✅ correct column names
    $name = $u_data['full_name'];
    $email = $u_data['email_id'];
    $phone = $u_data['phone_no'];
    $address = $u_data['address'];

    // ✅ correct orders table
    $sql = "INSERT INTO customer_orders (user_ref_id, items_bought, item_prices, final_total) 
            VALUES ('$u_id', '$items', '$items', '$total')";

    if(mysqli_query($conn, $sql)){
        $last_id = mysqli_insert_id($conn);
        echo "<script>
                alert('Order Done!'); 
                localStorage.removeItem('cart'); 
                window.location.href='admin.php';
              </script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>

<?php include("./Component/header.php"); ?>

<div class="menu-section" style="max-width:600px; margin:auto; background:white; padding:20px; border-radius:10px;">
    <h2>Your Cart Items</h2>

    <!-- ✅ USER INFO -->
    <p><b>Name:</b> <?php echo $u_data['full_name']; ?></p>
    <p><b>Email:</b> <?php echo $u_data['email_id']; ?></p>

    <div id="cartList"></div>

    <form method="POST">
        <input type="hidden" name="food_items" id="f_items">
        <input type="hidden" name="total_bill" id="f_total">
        <button type="submit" name="place_order" class="add-to-cart" style="background:green; width:100%;">Confirm Order</button>
    </form>
</div>

<script>
let cart = JSON.parse(localStorage.getItem("cart")) || [];
let list = document.getElementById("cartList");
let itemsStr = ""; 
let total = 0;

cart.forEach(item => {
    list.innerHTML += `<p>${item.name} x ${item.quantity} = ₹${item.price * item.quantity}</p>`;
    itemsStr += `${item.name}(${item.quantity}), `;
    total += (item.price * item.quantity);
});

document.getElementById("f_items").value = itemsStr;
document.getElementById("f_total").value = total;
</script>

</body>
</html>