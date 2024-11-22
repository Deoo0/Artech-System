<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ?");
    exit();
}

?>

<div id="order-container">
    <div id="order-form">
        <form action="POST" id="addForm">
            <div id="order-items">
                <div id="order-login" onclick="return closeLogin()">X</div>
                <h1><strong>ORDER</strong></h1>
                
                <div id="calculator-container">
                    <div id="calculator">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="product-select">Product:</label>
                                <select name="product" id="product-select" onchange="updatePrice()">
                                    <option value="" data-price="0">Select Product</option>
                                    <?php
                                    include('javascript/ajax/config.php');
                                    $name = "SELECT id,name,price FROM products WHERE status = 1";
                                    $result = mysqli_query($conn,$name);
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<option value="' . $row['id'] . '" data-price="' . $row['price'] . '">' . $row['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="clientName">Client Name:</label>
                                <input type="text" id="clientName" placeholder="Enter Client Name">
                            </div>
                        </div>
                        

                        <div class="form-row">
                            <div class="form-group">
                                <label for="clientContact">Client Contacts:</label>
                                <input type="text" id="clientContact" placeholder="Enter Contact Info">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" placeholder="Enter Quantity" oninput="calculateTotal()">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="total-cost">Cost:</label>
                                <input type="text" id="total-cost" value="0" readonly><br>
                            </div>
                            <div class="form-group">
                                <label for="status-select">Order Status:</label>
                                <select name="status" id="status-select">
                                    <option value="1">Completed</option>
                                    <option value="2">In Progress</option>
                                    <option value="3">Pending</option>
                                    <option value="4">Canceled</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="deadLine">Deadline:</label>
                                <input type="date" id="deadLine">
                            </div>
                        </div>

                        <input type="submit" id="addOrder" value="SUBMIT" onclick="return submitOrder()">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function () { // Label: added
    const dateInput = document.getElementById("deadLine"); // Label: unchanged

    // Get today's date in the correct format
    const today = new Date();
    const formattedDate = today.toISOString().split('T')[0]; // yyyy-MM-dd // Label: unchanged

    // Set the value of the date input
    dateInput.value = formattedDate; // Label: unchanged
});

</script>
