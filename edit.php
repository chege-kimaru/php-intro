<html>
<head>
<title>Form</title>
</head>
<body>
<h3>Edit user: <?php echo $_REQUEST['name']; ?></h3>
<?php include("links.php"); ?>
    <form  enctype="multipart/form-data" method="post" action="change.php">
    <table>
    <tr><td>Name: </td><td><input type="text" name= "name" value="<?php echo $_REQUEST['name']; ?>"/></td></tr>
    <tr><td>Email: </td><td><input type="email" name= "email" value="<?php echo $_REQUEST['email']; ?>"/></td></tr>
    <tr><td>Password: </td><td><input type="password" name= "password" value=""/></td></tr>
    <tr><td>Change picture</td><td><input type="file" name="upload"></td></tr>
    </table>
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="300000">
        <input type="submit" name="submit" value="Update">
        <input type="reset" name="reset" value="reset">
    </form>
    <a href="output.php">See data</a>
</body>
</html>