<div id="login-container">
    <div id="login-form">
        <form action="POST" id="loginForm">
            <div id="login-items">
                <div id="close-login" onclick="return closeLogin()">X</div>
                <label for="">
                    <h1>
                        <strong>
                            LOGIN
                        </strong>
                    </h1>
                </label><br><br><br>
                <input type="username" id="username" placeholder="Enter Username"><br><br>
                <input type="password" id="password" placeholder="Enter Password"><br><br>
                <input type="submit" id="loginbutton" value="Login" onclick="return loginBtn()">
            </div>
        </form>
    </div>
</div>