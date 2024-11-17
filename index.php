<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="javascript/main.js"></script>
    <link rel="stylesheet" href="design/style.css">
    <link rel="stylesheet" href="design/datatables.min.css">
    <title>ARTECH</title>
</head>
<body>
    <div id="pop-up"></div>
    <div id="notification"></div>
    <?php
    error_reporting(1);
    session_start();
    include('nav.php');
    nav();

    switch($_REQUEST['nav']){
        case 'home':
            include('home.php');
            break;
        case 'product':
            include('product.php');
            break;
        case 'order':
            include('order.php');
            break;
        case 'user':
            include('user.php');
            break;
        case 'logout':
            include('logout.php');
            break;
            
        default:
        include('home.php');
        break;
    }
    
    
    ?>


</body>
</html>