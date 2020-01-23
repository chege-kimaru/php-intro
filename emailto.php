<form action="">
<table>
<tr><td>TO:</td><td><input type="text" name="to" value="<?php echo $_REQUEST['email'];?>"></td></tr>
<tr><td>Subject:</td><td><input type="text" name="subject"></td></tr>
<tr><td>Message:</td><td><textarea type="text" name="message" cols="30" rows="10"></textarea></td></tr>
</table>
<input type="submit" value="send email" name="submit">
</form>

<?php 
    if(isset($_REQUEST['to']) && isset($_REQUEST['subject']) && isset($_REQUEST['message'])) {
        echo "Email successfully sent ):";
        header("Refresh: 3; url= update.php");
    }
?>