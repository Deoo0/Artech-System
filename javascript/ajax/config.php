<?php
    error_reporting(1);
    session_start();

    $conn = mysqli_connect('localhost','root','','artech');
    

    if (isset($_POST['abtn'])) {
        $usn = $conn->real_escape_string($_POST['usn']); // Label: unchanged
        $name = $conn->real_escape_string($_POST['name']); // Label: unchanged
        $pw = $conn->real_escape_string($_POST['pw']); // Label: unchanged

        // Check if user exists
        $chkr = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usn'");
        $stmt = "INSERT INTO users (name, username, password, usertype_id) VALUES ('$name', '$usn', '$pw', '2')";
        $row = mysqli_num_rows($chkr); // Label: changed | Fixed variable name from $chk to $chkr

        if ($row > 0) { // Label: changed | Corrected variable $rw to $row
            echo "USER ALREADY EXIST";
        } else {
            if (mysqli_query($conn, $stmt)) { // Label: added | Check if the query executed successfully
                echo "User Successfully Added";
            } else {
                echo "Error: " . mysqli_error($conn); // Label: added | Display error if query fails
            }
        }
    }

    if(isset($_POST['lbtn'])){
        $usn = $conn->real_escape_string($_POST['usn']);
        $pw = $conn->real_escape_string($_POST['pw']);
        
        $chk = mysqli_query($conn,"SELECT * FROM users WHERE username = '$usn'");
        $row = mysqli_num_rows($chk);

        if($row > 0){
            $data = mysqli_fetch_assoc($chk);
            $pw2= $data['password'];
            $id = $data['id'];

            if($pw == $pw2){
                session_start();
                $_SESSION['user_id'] = $id;
                echo "1";
            }
            else{
                echo "NO MATCH";
            }
        }
        else{
            echo "USER DOESN'T EXIST";
        }
    }

    if (isset($_POST['updBtn'])){
        $id = $conn->real_escape_string($_POST['updBtn']);
        $upd_input = $conn->real_escape_string($_POST['upd_input']);
        $upd_input = $conn->real_escape_string($_POST['upd_input']);
        $stmt = "DELETE FROM users WHERE id ='$id'";
        if(mysqli_query($conn,$stmt)){
            echo "Succefully Deleted User";
        }
        else{
            echo "Error: " . mysqli_error($conn);
        }
    }
    if (isset($_POST['deleteBtn'])){
        $id = $conn->real_escape_string($_POST['deleteBtn']);
        $stmt = "DELETE FROM users WHERE id ='$id'";
        if(mysqli_query($conn,$stmt)){
            echo "Succefully Deleted User";
        }
        else{
            echo "Error: " . mysqli_error($conn);
        }
    }


    if(isset($_POST['addprod'])){
        $productName = $conn->real_escape_string($_POST['prodName']);
        $prodPrice = $conn->real_escape_string($_POST['prodPrice']);

        $chk = mysqli_query($conn,"SELECT * FROM products WHERE name = '$productName'");
        $stmt = ("INSERT INTO products(name,price,status) VALUES ('$productName','$prodPrice',1)");
        $row = mysqli_num_rows($chk);

        if($row > 0){
            echo "Product Already Exist";
        }
        else{
            if(mysqli_query($conn,$stmt)){
                echo "Product Successfully Added";
            }
            else{
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    if(isset($_POST['addOrder'])){
        $product = $conn -> real_escape_string($_POST['product']);
        $clientName = $conn -> real_escape_string($_POST['name']);
        $clientContact = $conn -> real_escape_string($_POST['contact']);
        $quantity = $conn -> real_escape_string($_POST['quantity']);
        $totalCost = $conn -> real_escape_string($_POST['cost']);
        $deadline = $conn -> real_escape_string($_POST['deadline']);
        $orderDate = date("Y-m-d");
        $status = $conn->real_escape_string($_POST['status']);
        $refnum = rand(100000, 999999);

        $stmt = ("INSERT INTO orders (product_id,reference_num,client_name,client_info,order_date,quantity,total_price,status,deadline) VALUES('$product','$refnum','$clientName','$clientContact','$orderDate','$quantity','$totalCost','$status','$deadline')");

        if(mysqli_query($conn,$stmt)){
            echo "Order Successfully Added";
        }
        else{
            echo "Error: " . mysqli_error($conn);
        }
    }
    if(isset($_POST['deleteOrder'])){
        $id = $conn -> real_escape_string($_POST['deleteOrder']);
        $stmt = "DELETE FROM orders WHERE id = '$id'";
        if(mysqli_query($conn,$stmt)){
            echo "Successfully Deleted Order";
        }
        else{
            echo "Error: " . mysqli_error($conn);
        }
    }
    

    
    if(isset($_POST['deleteProd'])){
        $id = $conn ->real_escape_string($_POST['deleteProd']);
        $stmt = "DELETE FROM products WHERE id = '$id'";
        if(mysqli_query($conn,$stmt)){
            echo "Successfully Deleted Product";
        }
        else{
            echo "Error: " . mysqli_error($conn);
        }
    }

    if(isset($_POST['upBtn'])){

        $id = $conn -> real_escape_string($_POST['productid']);
        $name = $conn -> real_escape_string($_POST['upname']);
        $price = $conn -> real_escape_string($_POST['upprice']);
        $status = $conn -> real_escape_string($_POST['upstatus']);

        mysqli_query($conn,"UPDATE products SET name = '$name' ,price = '$price' ,status = '$status' WHERE id = '$id'");
        echo "Product Updated";
    }

    if(isset($_POST['upuserBtn'])){
        $id = $conn -> real_escape_string($_POST['userID']);
        $name = $conn -> real_escape_string($_POST['name']);
        $username = $conn -> real_escape_string($_POST['usn']);
        $password = $conn -> real_escape_string($_POST['pass']);
        mysqli_query($conn,"UPDATE users SET name = '$name', username='$username', password='$password' WHERE id = '$id'");

        echo "User Updated";
    }


    if(isset($_POST['uporderBtn'])){
        $id = $conn -> real_escape_string($_POST['id']);
        $name = $conn -> real_escape_string($_POST['name']);
        $date = $conn -> real_escape_string($_POST['date']);
        $quantity = $conn -> real_escape_string($_POST['quantity']);
        $price = $conn -> real_escape_string($_POST['price']);
        $deadline = $conn -> real_escape_string($_POST['deadline']);
        $info = $conn -> real_escape_string($_POST['clientinfo']);
        $status = $conn -> real_escape_string($_POST['status']);

        mysqli_query($conn, "UPDATE orders SET client_name ='$name',client_info='$info', order_date='$date', quantity='$quantity', total_price='$price',deadline='$deadline', status= '$status' WHERE id = '$id' ");
        echo ("Order Details Updated");
    }

?>