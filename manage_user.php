<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ?");
    exit();
}

?>

<div id="add-container">
    <div id="add-form">
        <form action="POST" id="addForm">
        <div id="add-items">
            <div id="add-login" onclick="return closeLogin()">X</div>
                <label for="">
                    <h1>
                        <strong>
                            Add User
                        </strong>
                    </h1>
                </label><br><br><br>

                <label class="label-design" for="username">Enter Name:</label>
                <input type="username" id="name" placeholder="Name"><br>
                <label class="label-design" for="username">Enter Username:</label>
                <input type="username" id="username" placeholder="Username"><br>
                <label class="label-design" for="username">Enter Password:</label>
                <input type="password" id="password" placeholder="Password"><br><br>
                <input type="submit" id="adduserbutton" value="SUBMIT" onclick="return submitUserBtn()">
            </div>
        </form>
    </div>
</div>