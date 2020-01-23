<html>
<head>
<title>Form</title>
</head>
<body>
<h3>Edit user: <?php echo $_REQUEST['name']; ?></h3>
<?php include("links.php"); ?>
<table border="1">
<thead><tr><th>Name</th><th>Email</th><th>Password</th></thead></tr>
<tbody><tr>
    <td><?php echo $_REQUEST['id']; ?></td>
    <td><?php echo $_REQUEST['name']; ?></td>
    <td><?php echo $_REQUEST['email']; ?></td>
    <td><?php echo $_REQUEST['password']; ?></td>
</tr></tbody>
</table>
    <h3>Are you sure you want to delete thie user?</h3>
    <form method="post" action="delete2.php">
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
        <input type="submit" name="submit" value="Delete">
    </form>
    <a href="output.php">See data</a>
</body>
</html>