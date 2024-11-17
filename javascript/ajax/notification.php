<?php
    $notif = $_POST['notif'];
    $display = "";
    $display .= "
            <div id='login-container'>
            <div id='login-form'>
                <form action='POST' id='loginForm'>
                    <div id='login-items'>
                        <div id='close-login' onclick='return closeNotif()' >X</div>
                        <label for=''>
                            <h1>
                                <strong>
                                    Notification
                                </strong>
                            </h1>
                        </label>
                        <br>
                        <br>
                        $notif
                    </div>
                </form>
            </div>
        </div>
    ";
    echo $display;
?>