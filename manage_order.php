<div id="order-container">
    <div id="order-form">
        <form action="POST" id="addForm">
        <div id="order-items">
            <div id="order-login" onclick="return closeLogin()">X</div>
                <label for="">
                    <h1>
                        <strong>
                            ORDER
                        </strong>
                    </h1>
                </label><br><br><br>
                <div id="calculator-container">
                    <div id="calculator">
                        <label for="">Product:</label>
                            <select name="product" id="product-select" onchange="updatePrice()"> <!-- Label: unchanged -->
                                <option value="" data-price="0">Select Product</option>
                                <?php
                                include('javascript/ajax/config.php');
                                $name = "SELECT id,name,price FROM products"; // Label: unchanged
                                $result = mysqli_query($conn,$name); // Label: unchanged
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<option value="' . $row['id'] . '" data-price="' . $row['price'] . '">' . $row['name'] . '</option>'; // Label: unchanged
                                }
                                ?>
                            </select>
                        <label for="">Client Name:</label>
                        <input type="text" id="clientName" placeholder="Enter Client Name"> <!-- Label: updated -->
                        <label for="">Client Contacts:</label>
                        <input type="text" id="clientContact" placeholder="Enter Contact Info"> <!-- Label: updated -->
                        <label for="">Quantity:</label>
                        <input type="number" id="quantity" placeholder="Enter Quantity" oninput="calculateTotal()"> <!-- Label: unchanged -->
                        <div id="cost">
                            <label for="">Cost:</label>
                            <input type="text" id="total-cost" value="0" readonly><br> <!-- Label: unchanged -->
                        </div>
                        <label for="">Deadline:</label>
                        <input type="date" id="deadLine" > <!-- Label: unchanged -->
                        <input type="submit" id="addOrder" value="SUBMIT" onclick="return submitOrder()"> <!-- Label: unchanged -->
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
