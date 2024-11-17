<?php
    $msg = $_POST['prompt'];
    $prompt = "";
    $prompt .= "
            <div id='prompt-container'>
            <div id='prompt-form'>
                <form action='POST' id='promptForm'>
                    <div id='prompt-items'>
                        <label for=''>
                            <h1>
                                <strong>
                                    Notification
                                </strong>
                            </h1>
                        </label>
                        <br>
                        <br>
                        $msg
                    </div>
                </form>
            </div>
        </div>
    ";
    echo $prompt;
?>