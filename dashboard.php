<?php
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    if(!empty($email) || !empty($passwd)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "registration";
    // Database connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if(mysqli_connect_error()){
        die("Error connecting to database ('.mysqli_connecgt_error()')".mysqli_connect_error());
    }
    else{
        $stmt = $conn->prepare("SELECT * FROM signup where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $num_rows = mysqli_num_rows($stmt_result);
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data["passwd"] == $passwd){
                echo "Name : " . $data["uname"];
                echo "<br> Age : " . $data["age"];
                echo "<br> DOB : " . $data["dob"];
                //header("Location: dashboard.html");
            }else{
                echo "<h2>Invalid Email or Password</h2>";
                echo "<p>Redirecting to Login page................</p>";
                header("Refresh:2; url=login.html");
            }
        }else{
            echo "<h2>Email Not Registered Yet</h2>";
            header("Refresh:2; url=login.html");
            echo "<p>Redirecting to Login page................</p>";
        }
        $stmt->close();
        $conn->close();
        }
    }else {
            echo "Fill all Details";
            die();
        }
?>