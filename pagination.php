<?php include("links.php"); ?>

<?php
$conn = new mysqli("localhost", "root", "kevinkimaru", "youtube_tut", "3306");
if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

$sql = "SELECT name FROM users";

$result = $conn->query($sql);

$per_page = 6;
$rows = $result->num_rows;
$pages = ceil($rows / $per_page);

$page = (isset($_GET['page'])) ? (int)$_GET['page']: 1;
$start = ($page - 1) * $per_page;
$sql = "SELECT  name FROM users LIMIT $start, $per_page";
$result = $conn->query($sql);

if($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
        echo $row["name"];
        echo "<br>";
    }
} else {
    echo "No data";
}

$conn->close();

$prev = $page -1;
$next =$page + 1;
if(!($page <= 1)) 
echo "<a href=\"?page=$prev\">Prev</a>";
if($pages >= 1) {
    for($x=1; $x<=$pages; $x++) {
        echo ($x == $page) ? "<b><a href=\"?page=$x\">$x</a></b>" : "<a href=\"?page=$x\">$x</a>";
        echo "   ";
    }
}
if(!($page >= $pages)) 
echo "<a href=\"?page=$next\">Next</a>";
?>
