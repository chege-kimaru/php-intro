<?php include("session.php"); ?>
<?php
$conn = new mysqli("localhost", "root", "kevinkimaru", "youtube_tut", "3306");
if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$per_page = 3;
$rows = $result->num_rows;
$pages = ceil($rows / $per_page);

$page = (isset($_GET['page'])) ? (int)$_GET['page']: 1;

$start = ($page - 1) * $per_page;
$sql = "SELECT * FROM users LIMIT $start, $per_page";
$result = $conn->query($sql);

if($result -> num_rows > 0) {

    echo "
    <table border=1>
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
    </thead>
    <tbody>
    ";

    while($row = $result -> fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        
        echo "
        <tr>
            <td><a href=\"delete1.php?id=$id&name=$name&email=$email&password=$password\">$id</a></td>
            <td>$name</td>
            <td>$email</td>
            <td>$password</td>
        </tr>
        ";
    }
    echo " 
    </tbody>
    </table>";

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