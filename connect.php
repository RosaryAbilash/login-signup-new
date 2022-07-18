<?php
    $uname = $_POST['uname'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];


    if(!empty($email) || !empty($username) || !empty($password)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "registration";
    // Create Connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if(mysqli_connect_error()){
        die("Error connecting to database ('.mysqli_connecgt_error()')".mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT email FROM signup WHERE email = ? Limit 1";
        $INSERT = "INSERT Into signup (uname, age, dob, email, passwd)values(?,?,?,?,?)";
        // prepare
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows();

        // Checking username
        if($rnum == 0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param('sssss', $uname, $age, $dob, $email, $passwd);
            $stmt->execute();
            //$stmt->store_result();
            echo "<h2>Successfully Registered</h2>";
            echo "<p>Redirecting to Login page................</p>";
            header("Refresh:2; url=index.php");
        }
        else {
            echo "<h2>Email Already Registered</h2>";
            echo "<p>Redirecting to Login page................</p>";
            header("Refresh:2; url=index.php");
        }
        $stmt->close();
        $conn->close();
    }
}else {
        echo "Fill all Details";
        die();
    }

?>
