<?php include("links.php"); ?>
<?php
    session_start();

    if(!isset($_POST['submit'])) {
        echo "NOt allowed";
        exit;
    }

    $mypic = $_FILES['upload']['name'];
    $tmp = $_FILES['upload']['tmp_name'];
    $type = $_FILES['upload']['type'];

    $id = $_POST['id'];
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];

    $valid = true;

    if(!$id) {
        $valid = false;
        echo 'Id is required <br/>';
    }
    if(!$name) {
        $valid = false;
        echo 'Name is required <br/>';
    }
    if(!$email) {
        $valid=false;
        echo 'Email is required <br/>';
    }
    if((($_SESSION['name']) != $name) && !$mypic) {
        $valid = false;
        echo "You have updated name. You will have to update profile picture as well.";  
    }
   
    if($valid) {
        echo 'Form is valid <br/>';
        $conn = new mysqli("localhost", "root", "kevinkimaru", "youtube_tut", "3306");
        if($conn -> connect_error) {
            die("Connection failed ".$conn -> connect_error);
        }
        
        $sql = "UPDATE users SET name='$name', email='$email' WHERE id='$id' ";
        if($conn->query($sql)){
            // echo "Successfully saved. Affected rows: ". $conn->affected_rows ."<br/>";
            echo "Successfully updated details.";
            if(isset($password) && $password != "") {
                $md5password = md5($password);
                $sql = "UPDATE users SET password='$md5password' WHERE id='$id' ";
                if($conn->query($sql)){
                    // echo "Successfully saved. Affected rows: ". $conn->affected_rows ."<br/>";
                    echo "Successfully updated password.";

                } else {
                    echo "Error: ". $conn->error;
                }
            }
            if($mypic) {  
                if(($type == "image/jpeg") || ($type == "image/jpg") || ($type == "image/png")) {
                    $dir = "profiles/".$_SESSION['name']."/images";
                    $handle = opendir($dir);
                    while(($file = readdir($handle)) != FALSE) {
                        if($file != "." && $file != ".." && $file != "Thumbs.db") {
                            unlink($dir."/".$file);
                        }
                    }
                    closedir($handle);
                    sleep(1);
                    if(($_SESSION['name']) != $name) {
                        rename("profiles/".$_SESSION['name'], "profiles/$name");
                    }
                    move_uploaded_file($tmp, "profiles/$name/images/$mypic");
                    echo "Successfully updated profile picture";
                    header("Refresh:1; url=logout.php");
                } else {
                    echo "This file has to be a jpeg or jpg or png.";
                }  
            }

        } else {
            echo "Error: ". $conn->error;
        }

        $conn -> close();
    }
    
?>