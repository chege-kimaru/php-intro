<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search</title>
</head>

<?php include("session.php");?>
    <form method="GET" action="search.php">
        <input type="text" name="search">
        <input type="submit" name="submit" value="submit">
    </form>

    <?php 
    if(isset($_REQUEST['submit'])) {
        $search = $_GET['search'];
        $terms = explode(" ", $search);
        $query = "SELECT * FROM users WHERE ";
        $i = 0;
        foreach($terms  as $each) {
            $i++;
            if($i == 1) {
                $query .= "name LIKE '%$each%' ";
            } else {
                $query .= "OR name LIKE '%$each%' ";
            }
        }

        $conn = new mysqli("localhost", "root", "kevinkimaru", "youtube_tut", "3306");
        if($conn->connect_error) {
            die ("Oops connection Error: ". $conn->connect_error);
        }

        $result = $conn->query($query);
        $num = $result->num_rows;
        echo "<h3>Results: $num results for $search</h3>";
        if( $num > 0 && $search != "") {
            while($row=$result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $password = $row['password'];

                echo "<h3> Name: $name </h3> Email: $email </br> Password: $password<hr/><br/>";
            }
        } else {
            echo "No results found";
        }
        $conn->close();
    }
    ?>
</body>
</html>