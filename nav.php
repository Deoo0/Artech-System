<?php
function nav() {
    ?>
    <nav id="navbar">
        <ul class="nav-menu">
            <!-- Grouped menu items -->
            <li><a href="?nav=home">HOME</a></li>
            <?php
            session_start();
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                include('javascript/ajax/config.php');

                $sql_userchecker = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
                $data = mysqli_fetch_assoc($sql_userchecker);
                $usertype_id = $data['usertype_id'];
                
                echo '<li><a href="?nav=product">PRODUCTS</a></li>';
                echo '<li><a href="?nav=order">ORDER</a></li>';
                if ($usertype_id == 1) {
                    echo '<li><a href="?nav=user">USERS</a></li>';
                }
                echo ' <li><a id="logout" href="?nav=logout">LOGOUT</a></li>';
            } else {
                echo '<li><a id="login" href="#" onclick="return login()">LOGIN</a></li>';
            }
            ?>
        </ul>
    </nav>
    <?php
}
?>
