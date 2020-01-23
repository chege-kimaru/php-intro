<?php

    if(!$_POST) {
        echo "ACcess denied";
        exit;
    }

    session_start();

    $name =  $_POST['name'];
    $password =  md5($_POST['password']);

    $valid = true;

    if(!$name) {
        $valid = false;
        echo 'Name is required <br/>';
    }
    if(!$password) {
        $valid=false;
        echo 'Password is required <br/>';
    }
   
    if($valid) {
        echo 'Form is valid <br/>';
        $conn = mysqli_connect("localhost", "root", "kevinkimaru", "youtube_tut", "3306");
        if(!$conn) {
            die("Connection failed ".mysqli_connect_error());
        }

        $result = mysqli_query($conn, "SELECT * FROM users WHERE name='$name'");

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $dbname = $row['name'];
            $dbpassword = $row['password'];

            if($dbpassword == $password) {
                $_SESSION['name'] = $dbname;
                if($_POST['remember'] == 'on') {
                    $expire = time() + 86400;
                    setcookie('testsite', $_SESSION['name'], $expire);
                }
                header("location: session.php");
            } else {
                echo "Wrong password";
            }
        } else {
            echo "Wrong username.";
        }

        mysqli_close($conn);
    }
    
?>