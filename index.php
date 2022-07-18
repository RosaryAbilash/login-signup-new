<?php
?>
<html>
    <head><title>Login And Signup</title>
    <link rel="stylesheet" href="login.css">
    </head>
    <body>
        
        <div class="hero">
            <div class="form-box">
                <div class="btn-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Login</button>
                    <button type="button" class="toggle-btn" onclick="signup()">Signup</button>
                </div>
                <form id="login" class="input" action="dashboard.php" method="post">
                    <input type="text" name="email" class="input-field" placeholder="Email Id" required>
                    <input type="text" name="passwd" class="input-field" placeholder="Password" required>
                    <input type="checkbox" class="checkbox"><span>Remember Password</span>
                    <button type="submit" class="submit-btn">Login</button>
                </form>
                <form id="signup" class="input"  action="connect.php" method="post">
                    <input type="text" name="uname"class="input-field" placeholder="Name" required>
                    <input type="number" name="age" class="input-field" placeholder="Age" required>
                    <input type="date" name="dob" class="input-field" placeholder="DOB" required>
                    <input type="email" name="email" class="input-field" placeholder="Email Id" required>
                    <input type="password" name="passwd" class="input-field" placeholder="Password" required>
                    <button type="submit" class="submit-btn">Signup</button>
                </form>
            </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>

