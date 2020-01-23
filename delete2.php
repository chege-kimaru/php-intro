<?php include("links.php"); ?>
<?php
    $id = $_POST['id'];

    $valid = true;

    if(!$id) {
        $valid = false;
        echo 'Id is required <br/>';
    }
   
    if($valid) {
        echo 'Form is valid <br/>';
        $conn = new mysqli("localhost", "root", "kevinkimaru", "youtube_tut", "3306");
        if($conn -> connect_error) {
            die("Connection failed ".$conn -> connect_error);
        }
    
        $sql = "DELETE FROM users WHERE id='$id' ";
        if($conn->query($sql)){
            echo "Successfully deleted. Affected rows: ". $conn->affected_rows ."<br/>";
        } else {
            echo "Error: ". $conn->error;
        }

        $conn -> close();
    }
    
?>