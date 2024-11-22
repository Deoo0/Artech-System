<?php include('topbar.php'); ?>
<?php
session_start();
include('javascript/ajax/config.php');

// Check login status
$isLoggedIn = isset($_SESSION['user_id']);

// Fetch data only if logged in
if ($isLoggedIn) {
    $orders = mysqli_query($conn, "SELECT * FROM orders");
    $product = mysqli_query($conn, "SELECT * FROM products WHERE status = 1");

    $orderrow = mysqli_num_rows($orders);
    $productrow = mysqli_num_rows($product);
}
?>

<div class="container">
    <!-- Background Logo -->
    <div class="background-logo">
        <img src="artechlogo2.png" alt="logo" class="logo">
    </div>

    <!-- Cards Section -->
    <?php if ($isLoggedIn): ?>
        <div id="data">
            <a href="?nav=order" style="text-decoration: none;">
            <div id="order" class="card">
                <label id="labelord" for="orders">ORDERS</label><br>
                <img id="ordericon" src="order.png" alt="Orders Icon">
                <h1 id="textorder"><?php echo $orderrow; ?></h1>
            </div>
            </a>
            <a href="?nav=product" style="text-decoration: none;">
            <div id="product" class="card">
                <label id="labelpro" for="products">PRODUCTS</label><br>
                <img id="producticon" src="product.png" alt="Products Icon">
                <h1  id="textproduct"><?php echo $productrow; ?></h1>
            </div>
            </a>
        </div>
    <?php endif; ?>
</div>

<style>
    /* Main container for the entire layout */
    .container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100vh;
        overflow: hidden;
    }

    /* Full-screen Background Logo */
    .background-logo {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
        opacity: 0.1; /* Adjust visibility of the logo */
    }

    .background-logo .logo {
        width: auto;
        height: 100%;
        object-fit: cover;
    }

    /* Cards Section */
    #data {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: flex-start; /* Align cards at the top */
        gap: 50px;
        z-index: 2; /* Ensures cards are above the background */
        margin-top: 80px; /* Adjust the top spacing */
    }

    /* Card Styling */
    .card {
    position: relative;
    padding: 20px;
    width: 300px;
    height: 150px;
    border-radius: 20px;
    text-align: center;
    background: linear-gradient(to bottom, #4a90e2, #283e51); /* Softer blue gradient */
    transition: transform 0.3s, backdrop-filter 0.3s;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    overflow: hidden; /* Ensures content stays within the card */
}

/* Specific Card Backgrounds */
#order {
    background-image: linear-gradient(to bottom, #f2994a, #f2c94c); /* Warm gradient for orders */
}

#product {
    background-image: linear-gradient(to bottom, #56ab2f, #a8e063); /* Green gradient for products */
}

/* Icons Positioned Behind Text */
#ordericon,
#producticon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 120px;
    height: auto;
    opacity: 0.15; /* Slightly lower opacity for better readability */
    z-index: 1;
}

/* Labels and Numbers */
#labelord,
#labelpro {
    position: relative;
    font-size: 22px;
    font-family: 'Trebuchet MS', Arial, sans-serif;
    font-weight: bold;
    color: #ffffff; /* White text for contrast */
    z-index: 2;
}

#textorder,
#textproduct {
    position: relative;
    font-size: 40px;
    font-family: Georgia, 'Times New Roman', Times, serif;
    color: #ffffff; /* White text for readability */
    z-index: 2;
}
</style>
