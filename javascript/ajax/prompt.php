<?php
    $msg = $_POST['prompt'];
    $prompt = "";
    $prompt .= "
            <div id='prompt-container'>
                <div id='prompt-form'>
                    <div id='prompt-header'>
                        <h1>Notification</h1>
                    </div>
                    <div id='prompt-body'>
                        <p id='message'>$msg</p>
                    </div>
                    <div id='prompt-footer'>
                        <button onclick='return closePrompt()' id='confirm-button'>OK</button>
                    </div>
                </div>
            </div>


    ";
    echo $prompt;
?>