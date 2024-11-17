<script src="javascript/main.js"></script>
<link rel="stylesheet" href="design/style.css">

    <div id="prod-container">
    <div id="calculator-container">
    <div id="prod-form">
        <form action="POST" id="addForm">
                <div id="prod-login" onclick="return closeLogin()">X</div>
                <CENTER>
                    <h1>TOP PAY</h1>
                </CENTER>
                    <div id="calculator">
                        <label for="">Product:</label>
                        <select name="" id="product-select" onchange="updatePrice()">
                            <option value="" data-price="0">Select Product</option>
                            <?php
                            include('javascript/ajax/config.php');
                            $name = "SELECT id,name,price FROM products";
                            $result = mysqli_query($conn,$name);
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<option value="' . $row['id'] . '"data-price="' . $row['price'] . '">' . $row['name'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="">Quantity:</label>
                        <input type="number" id="quantity" placeholder="Enter Quantity" oninput="calculateTotal()">
                        <div id="cost">
                            <label for="">Cost:</label>
                            <input type="text" id="total-cost" value="0" readonly><br>
                        </div>
                    </div>
        </form>
    </div>
    </div>
</div>
    