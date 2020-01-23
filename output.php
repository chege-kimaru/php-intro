<?php include("links.php"); ?>
<?php
$conn = new mysqli("localhost", "root", "kevinkimaru", "youtube_tut", "3306");
if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
        echo $row["name"]. "   ". $row["email"]. "   ". $row["password"]. " <br/>";
    }
} else {
    echo "No data";
}

$conn->close();
?>
