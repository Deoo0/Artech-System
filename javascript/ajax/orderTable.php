<?php
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