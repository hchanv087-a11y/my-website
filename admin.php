<?php
session_start();
include("config.php");

// Check DB connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch customers
$customers = mysqli_query($conn, "SELECT * FROM customer_details");

// Fetch orders
$orders = mysqli_query($conn, "
    SELECT co.*, cd.full_name, cd.email_id, cd.phone_no, cd.address 
    FROM customer_orders co
    JOIN customer_details cd 
    ON co.user_ref_id = cd.user_id
    ORDER BY co.order_id DESC
");

// Count totals
$total_users = mysqli_num_rows($customers);
$total_orders = mysqli_num_rows($orders);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Panel - Spicy Slice</title>

<style>
body{
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: #f4f4f4;
}

.header{
    background: #ff512f;
    padding: 15px;
    color: white;
    text-align:right;
}

.header a{
    color: white;
    text-decoration: none;
    margin-right: 15px;
}

.footer{
    background: #ff512f;
    padding: 15px;
    color: white;
    text-align: center;
    margin-top: 40px;
}

.container{
    padding: 20px;
}

h1{
    text-align: center;
    color: #ff512f;
}

.stats{
    text-align:center;
    margin: 20px 0;
    font-size: 18px;
    font-weight: bold;
}

table{
    width: 100%;
    border-collapse: collapse;
    background: white;
}

th, td{
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

th{
    background: #ff512f;
    color: white;
}

.section{
    margin-top: 40px;
}
</style>

</head>
<body>

<div class="container">

<h1>Admin Panel</h1>

<!-- Total Counts -->
<div class="stats">
    Total Users: <?php echo $total_users; ?> |
    Total Orders: <?php echo $total_orders; ?>
</div>

<div class="section">
<h2>Customer Details</h2>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Gender</th>
<th>Address</th>
</tr>

<?php if ($customers && mysqli_num_rows($customers) > 0) { ?>
    <?php while($row = mysqli_fetch_assoc($customers)) { ?>
    <tr>
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['email_id']; ?></td>
        <td><?php echo $row['phone_no']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['address']; ?></td>
    </tr>
    <?php } ?>
<?php } else { ?>
<tr><td colspan="6">No customers found</td></tr>
<?php } ?>

</table>
</div>

<div class="section">
<h2>Customer Orders</h2>

<table>
<tr>
<th>Order ID</th>
<th>User ID</th>
<th>Name</th>
<th>Email</th>
<th>Items</th>
<th>Total</th>
</tr>

<?php if ($orders && mysqli_num_rows($orders) > 0) { ?>
    <?php while($o = mysqli_fetch_assoc($orders)) { ?>
    <tr>
        <td><?php echo $o['order_id']; ?></td>
        <td><?php echo $o['user_ref_id']; ?></td>
        <td><?php echo $o['full_name']; ?></td>
        <td><?php echo $o['email_id']; ?></td>
        <td><?php echo $o['items_bought']; ?></td>
        <td>₹<?php echo $o['final_total']; ?></td>
    </tr>
    <?php } ?>
<?php } else { ?>
<tr><td colspan="6">No orders found</td></tr>
<?php } ?>

</table>
</div>

</div>

<div class="footer">
    <p>"Discover a world of flavor, crafted with passion and served with a smile."</p>
    <p>Fresh flavors, simple ingredients, unforgettable taste.<br>
    Cook with passion, serve with love.</p>
</div>

</body>
</html>