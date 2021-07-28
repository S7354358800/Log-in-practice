<?php
$link = mysqli_connect("localhost", "root", "","vj");
session_start();
if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}
   $emailAddress=mysqli_real_escape_string($link,$_POST['username']);
   $password=mysqli_real_escape_string($link,$_POST['password']);
    $pass=password_hash($password,PASSWORD_BCRYPT);
   $sql= "SELECT  * FROM students"; 
   $result=mysqli_query($link,$sql);
   $n=mysqli_num_rows($result);
   $row=mysqli_fetch_array($result);
    
   $status=false;
   for($i=1;$i<=$n;$i++)
   {
      $row=mysqli_fetch_array($result);
      if(($row['email_address']==$emailAddress)&&(password_verify($password,$pass)))
      {
          $status=true;
          break; 
      }
}
if($status)
{
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <style>
    	table, th, td {
		border-collapse: collapse;
  
  border: 2px solid black;
}th{
  padding: 15px;
  text-align: center;
 }
td
 {
 	text-align: right;
 }table {
   
  border-spacing: 15px;
}

    </style>
</head>
<center>
<body >

<table >
 <tr> <th>
    firstName;
</th>
<th>
   lastName;
</th>
<th>
    $emailAddress;
</th>
<th>
  password;
</th></tr>
<tr>
  <td>
    <?php echo $row['first_name']; ?>
</td>
<td>
<?php  echo $row['last_name'];?>
</td>
<td>
<?php echo $row['email_address'];?>
</td>
<td>
<?php echo $row['password'];?>
</td>
</tr>
</table>
<button><a href="logout.php">logout</a></button>
<center>
</body>
</html>  
 <?php
} 
else{
  ?>
  <html>
    <body>
  <center><h1>NO records found  try again</h1></center>
</body>
</html>
<?php
}
?>

   


 
