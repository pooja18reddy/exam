<?php
	session_start();
?>
<html>
<body>
<form action="undertaking.php" method="post" enctype="multipart/form-data">
		
<?php

$conn = new mysqli('localhost', 'root', '123456') or die(mysqli_error());
$db = mysqli_select_db($conn, 'IP') or die("databse error");
$u=$_SESSION['user'];
$n=$_SESSION['name'];
echo "I $n with ID no. $u, of PRESIDENCY UNIVERSITY will agree to work in any company alloted and so on...";

?>
<input type="submit" value"Submit" name="submit" >
</form>
</body>
</html>
	
	
	
	
	
	
