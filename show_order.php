<?php
include('javascript/ajax/config.php');

if (isset($_POST['productId'])) {
    $productId = $conn->real_escape_string($_POST['productId']);

    // Query to fetch order details and product name
    $status = array("", "Completed", "Inprogress","Pending","Canceled","Overdue");
    $query = "SELECT 
                o.id AS order_id, 
                o.order_date, 
                o.client_name, 
                p.name AS product_name, 
                o.quantity, 
                o.total_price, 
                o.status,
                o.deadline
              FROM 
                orderss o 
              JOIN 
                products p 
              ON 
                o.product_id = p.id 
              WHERE 
                o.product_id = '$productId'";
    $result = mysqli_query($conn, $query);

    if ($result && $result->num_rows > 0) {
        echo "<table id='order-table' style='width:100%; text-align:left;'>";
        echo "<thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Client Name</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Deadline</th>
                    <th>Status</th>
                </tr>
              </thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['order_id']}</td>
                    <td>{$row['order_date']}</td>
                    <td>{$row['client_name']}</td>
                    <td>{$row['product_name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['total_price']}</td>
                    <td>{$row['deadline']}</td>
                    <td>{$status[$row['status']]}</td>
                  </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p>No orders found for this product.</p>";
    }
} else {
    echo "Invalid Request";
}
?>
