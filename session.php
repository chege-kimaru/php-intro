<?php 
session_start();
if(!isset($_SESSION['name']) && !isset($_COOKIE['testsite'])) {
    echo "<h3>Access is denied<h3>";
    exit;
}

if(!isset($_SESSION['name']) && isset($_COOKIE['testsite'])) {
   $_SESSION['name'] = $_COOKIE['testsite'];
}

$date = date('F d, Y, g:i:s a');
echo "Date: ".$date. "<br>";

$dir = "profiles/".$_SESSION['name']."/images/";
$open = opendir($dir);
while(($file = readdir($open)) != FALSE) {
    if($file != "." && $file != ".." && $file != "Thumbs.db") {
        echo "<img border = \"1\" width=\"50\" height=\"50\" src=\"$dir/$file\">";
    }
}

echo "&nbsp;   <b>".$_SESSION['name']."'s</b> session <a href=\"logout.php\">Logout</a>";

include('links.php');

?>