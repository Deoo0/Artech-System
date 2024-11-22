<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

include('javascript/ajax/config.php');

if (isset($_POST['productId'])) {
  $productId = $conn->real_escape_string($_POST['productId']);

  // Query to fetch order details and product name
  $status = array(
      1 => "Completed",
      2 => "In progress",
      3 => "Pending",
      4 => "Canceled"
  );

  $query = "SELECT 
              o.id AS order_id, 
              o.order_date, 
              o.client_name, 
              o.client_info,
              p.name AS product_name, 
              o.quantity, 
              o.total_price, 
              o.status,
              o.deadline
            FROM 
              orders o 
            JOIN 
              products p 
            ON 
              o.product_id = p.id 
            WHERE 
              o.product_id = '$productId'";

  $result = mysqli_query($conn, $query);
  $id = $conn -> real_escape_string($_POST['order_id']);
  if ($result && $result->num_rows > 0) {
      echo "<table id='order-table' style='width:100%; text-align:left; border-collapse: collapse;'>";
      echo "<thead>
              <tr>
                  <th>Ref #</th>
                  <th>Order Date</th>
                  <th>Client Name</th>
                  <th>Client Contact</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Deadline</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
            </thead>";
      echo "<tbody>";

      $status = array("","Completed", "Inprogress", "Pending", "Canceled", "Overdue");

while ($row = $result->fetch_assoc()) {
  $status_color = '';
  $id = $row['order_id'];
  $mainstat = $row['status'];
  switch ($row['status']) {
      case 1: $status_color = 'background-color: #d4edda; color: #155724;'; break; // Green for Completed
      case 2: $status_color = 'background-color: #d1ecf1; color: #0c5460;'; break; // Light blue for In progress
      case 3: $status_color = 'background-color: #fff3cd; color: #856404;'; break; // Yellow for Pending
      case 4: $status_color = 'background-color: #f8d7da; color: #721c24;'; break; // Red for Canceled
      case 5: $status_color = 'background-color: #f5c6cb; color: #721c24;'; break; // Red for Overdue
  }


    echo "
    <style>
      #orderdate$id,#deadline$id{
      height:100%;
      font-weight:bold;
      border:none;
      }
      #orderinfo$id{
      width:100%;
      padding:0;
      height:100%;
      font-weight:bold;
      border:none;
      text-align: center;
      font-size:15px;
      letter-spacing:2px;
      }
      #stat$id{
      width: 20px;
      border:none;
      }
      #ordername$id{
      width:100%;
      padding:0;
      height:100%;
      border:none;
      font-size:20px;
      text-align:center;

      }
      #quantity$id{
      width:50px;
      text-align:center;
      font-size: 20px;
      width: 95%;
      height: 95%;
      border:none;
      }
      #price$id{
      width:60px;
      text-align:center;
      font-size: 20px;
      width: 95%;
      height: 95%;
      border:none;
      }


      </style>

    
          <tr>
            <td style='font-size:15px; '> {$row['order_id']}</td>
            <td style='font-size:15px; padding:0; '><input  type='date' id= 'orderdate$id'value='{$row['order_date']}'></td>
            <td style='font-size:15px; padding:0; '><input type='text' id='ordername$id' value='{$row['client_name']}'></td>
            <td style='font-size:15px; padding:0; '><input type='text' id='orderinfo$id' value='{$row['client_info']}'></td>
            <td style='width:50px; padding:0;'><input type='number' id='quantity$id' value='{$row['quantity']}'></td>
            <td style='font-size:15px; padding:0;'><input type='number' id='price$id' value='{$row['total_price']}'></td>
            <td style='font-size:15px; padding:0;'><input type='date' id='deadline$id' value='{$row['deadline']}'></td>
            <td style='font-size:20px; text-align: center; {$status_color}'>{$status[$row['status']]}
              <select class='status-select' id='stat$id'>
                <option value='$mainstat'></option>
                <option value='1'>Completed</option>
                <option value='2'>In Progress</option>
                <option value='3'>Pending</option>
                <option value='4'>Canceled</option>
                <option value='5'>Overdue</option>
              </select>
            
            </td>
            <td style='font-size:15px'>
                <div class='action-buttons-orders'>
                    <button class='btn-edit-order' id='updateorder' onclick='return upOrder($id)'>Update</button>
                    <button class='btn-delete-order' onclick='return deleteOrder($id)'>Delete</button>
                </div>
            </td>
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
