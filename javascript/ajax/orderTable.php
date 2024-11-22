<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ?");
    exit();
}
    $table = $_POST['order'];
    $prompt = "";
    $prompt .= "
            <div id='table-container'>
            <div id='table-form'>
                <form action='POST' id='tableForm'>
                    <div id='table-items'>
                    <div id='close-login' onclick='return closeNotif()' >X</div>
                        <label for=''>
                            <h1>
                                <strong>
                                    ORDERS
                                </strong>
                            </h1>
                        </label>
                        <br>
                        <br>
                        $table
                    </div>
                </form>
            </div>
        </div>
    ";
    echo $prompt;
?>