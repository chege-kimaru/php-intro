<?php include("links.php"); ?>
<?php
    $mypic = $_FILES['upload']['name'];
    $tmp = $_FILES['upload']['tmp_name'];
    $type = $_FILES['upload']['type'];

    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $valid = true;

    if(!$name) {
        $valid = false;
        echo 'Name is required <br/>';
    }
    if(!$email) {
        $valid=false;
        echo 'Email is required <br/>';
    }
    if(!$password) {
        $valid=false;
        echo 'Password is required <br/>';
    }
    if(!$cpassword) {
        $valid=false;
        echo 'Please confirm password <br/>';
    }
    if($password !== $cpassword) {
        $valid=false;
        echo 'Passwords must match <br/>';
    }
    if( $valid && strlen($password) < 3) {
        $valid= false;
        echo 'Password is too short';
    }
    if(($type == "image/jpeg") || ($type == "image/jpg") || ($type == "image/png")) {
        
    } else {
        $valid = false;
        echo "This file has to be a jpeg or jpg or png.";
    }
   
    if($valid) {
        echo 'Form is valid <br/>';
        $conn = mysqli_connect("localhost", "root", "kevinkimaru", "youtube_tut", "3306");
        if(!$conn) {
            die("Connection failed ".mysqli_connect_error());
        }

        $names = mysqli_query($conn, "SELECT name FROM users WHERE name='$name'");
        if(mysqli_num_rows($names) > 0) {
            die("<h5>Name already exists. Please choose another.</h5>");
        }

        $emails = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
        if(mysqli_num_rows($emails) > 0) {
            die("<h5>Email already exists. Please choose another.</h5>");
        }
         
        $passwordmd5 = md5($password);
        $sql = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$passwordmd5');";
        if(mysqli_query($conn, $sql)){
            // echo "Successfully saved. Affected rows: ". mysqli_affected_rows($conn) ."<br/>";
            // echo "Successfully saved. last id is: ". mysqli_insert_id($conn);
            $dir = "./profiles/$name/images/";
            mkdir($dir, 0777, true);
            move_uploaded_file($tmp, "profiles/$name/images/$mypic");
            echo "This will be your profile picture: <img border = \"1\" width=\"50\" height=\"50\" src=\"profiles/$name/images/$mypic\">";
            echo "Successfully registered. <a href=\"home.php\">Login </a>";
        } else {
            echo "Error: ". mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    
?>