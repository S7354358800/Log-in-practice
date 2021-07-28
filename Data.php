<?php
$link = mysqli_connect("localhost", "root", "", "vj");
if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}
$first_name = mysqli_real_escape_string($link, $_POST['firstname']);
$last_name = mysqli_real_escape_string($link, $_POST['lastname']);
$email_address = mysqli_real_escape_string($link, $_POST['email_address']);
$pass = mysqli_real_escape_string($link, $_POST['password']);
$pic = mysqli_real_escape_string($link, $_POST['pic']);
 $password=password_hash($pass, PASSWORD_BCRYPT);
// attempt insert query execution
$sql = "INSERT INTO  students (first_name, last_name,email_address,password,pic)VALUES('$first_name',
'$last_name','$email_address','$password','$pic')";
if(mysqli_query($link, $sql))
{
	header('login.php');
echo "Records added successfully.";
?>
<h2>click here to login</h2>
<button><a href="login.html">login</a></button>
<?php
}
else
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
mysqli_close($link);
?>