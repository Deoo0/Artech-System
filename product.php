<?php 

session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ?");
    exit();
}

include('topbar.php');
?>
<div id="container">
    <span >
        <h1 id="TITLE" >PRODUCTS</h1>
    </span>
    <input type="submit" id="add-user" value="+ Add Products" onclick="return addProduct()">
    <div id="row">
        <table id="table">
            <thead>
                <th class="text-center">Products</th>
                <th class="text-center">Price</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </thead>
            <tbody>
                <?php
                error_reporting(1);

                include('javascript/ajax/config.php');
                $status = array("", "Available", "Unavailable");
                $products = mysqli_query($conn, "SELECT * FROM products ORDER BY name ASC");
                $i = 1;
                $num = mysqli_num_rows($products);
                if($num > 0){
                while($row = $products->fetch_assoc()){
                    $bgColor = $row['status'] == 1 ? 'rgb(36, 206, 59)' : 'red';
                    $id = $row['id'];
                    $prodname = $row['name'];
                    $prodprice = $row['price'];
                    $mainstat = $row['status'];
                    $i = 1;
                    $stat = $status[$row['status']];
                    $display .="
                    <style>
                        /* Table row */
                        #product-row {
                            border-bottom: 1px solid #e0e0e0;
                        }

                        /* Table cell styling */
                        #product-row td {
                            padding: 0;
                            vertical-align: middle;
                        }
                        #name-row{
                        width:300px
                        }
                        #price-row{
                        width:150px;
                        }
                        #status-row{
                        width:300px;
                        }

                        /* Input field styles */
                        #prodname$id, .product-price-input {
                            width: 100%;
                            height: 100px;
                            padding: 10px;
                            font-size:20px;
                            border:  #ccc;
                            border-radius: 4px;
                            box-sizing: border-box;
                            text-align: center;
                        }
                        #status$id{
                            width:20px;
                        }

                        /* Select dropdown */
                        .status-select {
                            padding: 6px;
                            font-size: 14px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            background-color: #fff;
                            cursor: pointer;
                        }

                        /* Action buttons */
                        .action-buttons {
                            display: flex;
                            flex-direction: column;
                            align-items:center;

                        }

                        .update-button, .delete-button {
                            padding: 8px 12px;
                            font-size: 14px;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            color: #fff;
                            width:100px;
                        }

                        .update-button {
                            background-color: #4CAF50; /* Green */
                        }

                        .delete-button {
                            background-color: #f44336; /* Red */
                        }

                        .update-button:hover {
                            background-color: #45a049;
                        }

                        .delete-button:hover {
                            background-color: #d32f2f;
                        }
                        #action-row{
                            width:20px
                            margin:0px;
                        }

                    </style>

                    <tr id='product-row' class='product-row'>
                        <td id='name-row'>
                            <input class='product-name-input' id='prodname$id' type='text' value='$prodname'>
                        </td>
                        <td id='price-row'>
                            <input class='product-price-input' id='prodprice$id' type='number' value='$prodprice'>
                        </td>
                        <td id='status-row'>
                            <span class='product-status' style='background-color: $bgColor; padding: 5px 10px; border-radius: 5px; color: white;'>$stat</span>
                            <select class='status-select' id='status$id'>
                                <option value='$mainstat'></option>
                                <option value='1'>Available</option>
                                <option value='2'>Unavailable</option>
                            </select>
                        </td>
                        <td id='action-row'>
                            <div class='action-buttons'>
                                <button class='update-button' id='btn-update' onclick='upProduct($id)'>Update</button>
                                <button class='delete-button' id='btn-delete' onclick='deleteProduct($id)'>Delete</button>
                            </div>
                        </td>
                    </tr>

                    ";
                    $i++;
                }
                }
                else{
                    $display .= "NO PRODUCT";
                }

                echo $display
                ?>
                
            </tbody>
        </table>
    </div>
</div>