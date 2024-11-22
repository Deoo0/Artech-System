<?php include('topbar.php');?>
<center><img src="artechlogo2.png" alt="error" style=" height:50%; width:auto; margin-top:0;"></center>
<?php
    include('javascript/ajax/config.php');

    $prod = mysqli_query($conn, "SELECT * FROM product where status = 1");
    $prodrow = mysqli_num_rows($prod);
    $ord = mysqli_query($conn, "SELECT * FROM orders where status = 1");
    $ordrow = mysqli_num_rows($ord);
    $display .="";
    $display .= "
        <center>
        <h1>
            $prodrow
        </h1>
        <h1>
            $ordrow
        </h1>
        </center>

        
    ";
    echo $display;


?>

