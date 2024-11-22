<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ?");
    exit();
}
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
    $display .= "";
    $display .="
    <tr class='product-row'>
        <td>
            <input class='product-name-input' id='prodname$id' type='text' value='$prodname'>
        </td>
        <td>
            <input class='product-price-input' id='prodprice$id' type='number' value='$prodprice'>
        </td>
        <td>
            <span class='product-status'>$stat</span>
            <select class='status-select' id='status$id'>
                <option value='$mainstat'>Update Status</option>
                <option value='1'>Available</option>
                <option value='2'>Unavailable</option>
            </select>
        </td>
        <td>
            <div class='action-buttons'>
                <button class='update-button' id='btn-update' onclick='upProduct($id)'>Update</button>
                <button class='delete-button' id='btn-delete' onclick='deleteProduct($id)'>Delete</button>
            </div>
        </td>
    </tr>

    ";
    }
}
else{
    $display .= "NO PRODUCT";
}

echo $display











?>