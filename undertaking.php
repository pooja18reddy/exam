<?php
	session_start();
?>
<!DOCTYPE html>

<html>
<head>
<title>CAA</title>
<meta charset="utf-8">

<link href="layout.css" rel="stylesheet" type="text/css" media="all">
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">

<script>
var ajaxobject=new XMLHttpRequest();
function undertaking() {
if(!ajaxobject)
{
document.getElementById("undertaking").innerHTML="AJAX obejct could not be created";
return;
}
ajaxobject.open("GET","ut.php");
ajaxobject.send();
ajaxobject.onreadystatechange=getResponse;
}
function getResponse(){
if(ajaxobject.readyState == 4 && ajaxobject.status == 200)
{
document.getElementById('undertaking').innerHTML=ajaxobject.responseText;
}
}
</script>
</head>
<body id="top">

<div class="wrapper row1">
  <header id="header" class="clear"> 
    
     <div id="logo" class="fl_left">
		 
			<img src="img/Capture.PNG">
    </div>
    
  
  </header>
</div>

<div class="wrapper row2">
  <nav id="mainav" class="clear"> 
 
    <ul class="clear">
      <li class="active"><a href="undertaking.php">Undertaking</a></li>

<li class ="button"><a href="logout.php"> LOGOUT</a></li>
                
    </ul>
   
  </nav>
</div>

<div class="wrapper row3">
  <main class="container clear"> 





<h2 align="center"> UNDERTAKING </h2>
<form>
<input type="button" value ="Click here to fill undertaking" onclick="undertaking()"/>
</form>
<div id="undertaking" align="center">
</div>
<?php 

if(isset($_POST["submit"])){
    $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
    $db = mysqli_select_db($conn, 'IP') or die("DB Error"); 
		echo "<script type='text/javascript'> document.location = 'preference.php'; </script>";
		$u=$_SESSION['user'];
 // Select DB from database
 $query = mysqli_query($conn, "SELECT * FROM eligibility WHERE student_id='$u'");
 $numrows = mysqli_num_rows($query);
 if($numrows == 0)
  {
	  $sql = "INSERT IGNORE INTO eligibility(student_id,undertaking) VALUES('$u','given')";
	  if (mysqli_query($conn, $sql)) {
	      echo "New record created successfully";
	  } else {
	      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	  }
 
}
else
{
    $sql = "UPDATE eligibility SET undertaking='given' WHERE student_id='$u'";
    if (mysqli_query($conn, $sql)) {
        echo "updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}
 ?>

</div>
    


  

<div class="wrapper row4">
  <footer id="footer" class="clear"> 
  <div class="row">
	







    
  </footer>
</div>
</div>
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    
     <p class="fl_left">&copy; 2018 CompanyAllotment. All Rights Reserved by Presidency University</p>
    
</div>
  </div>

</html>

