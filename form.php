<html>
<head>
<title>Form</title>
</head>
<body>
    <form  enctype="multipart/form-data" method="post" action="process_form.php" autocomplete="off">
    <table>
    <tr><td>Name: </td><td><input type="text" name= "name" maxlength="15" /></td></tr>
    <tr><td>Email: </td><td><input type="email" name= "email" value="kev@gmail.com" maxlength="30" /></td></tr>
    <tr><td>Password: </td><td><input type="password" name= "password" value="kevv" maxlength="15" /></td></tr>
    <tr><td>confirm Password: </td><td><input type="password" name= "cpassword" value="kevv" maxlength="15" /></td></tr>
    <tr><td> Choose picture: </td><td><input type="file" name="upload"></td></tr> 
    </table>
    <input type="hidden" name="MAX_FILE_SIZE" value="300000">
    <input type="submit" name="submit" value="submit">
    <input type="reset" name="reset" value="reset">
    </form>
    Already registered?<a href='home.php'>Login</a>
</body>
</html>