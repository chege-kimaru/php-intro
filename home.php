<?php

if(isset($_COOKIE['testsite'])) {
    header("location: session.php");
} else {
echo "
<html>
<head>
 <title>CRUD Tutorial</title>
</head>
<body>
    <h2>CRUD Tutorial</h2>
    <h3>Please login</h3>
    <form method='post' action='login.php'>
    <table>
    <tr><td>Name: </td><td><input type='text' name= 'name' maxlength='15'/></td></tr>
    <tr><td>Password: </td><td><input type='password' name= 'password' maxlength='15' /></td></tr>             
    <tr><td>Remember me: </td><td><input type='checkbox' name= 'remember' /></td></tr>             
    </table>
    <input type='submit' name='submit' value='login'>
    <input type='reset' name='reset' value='reset'>
    </form>
    <a href='form.php'>Register?</a>
</body>
</html>
";
}

?>