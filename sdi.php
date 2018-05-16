<!DOCTYPE html>

<html>
<head>
<title>CAA</title>
<meta charset="utf-8">

<link href="layout.css" rel="stylesheet" type="text/css" media="all">
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
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
      <li class="active"><a href="sdi.php">ADD</a></li>
              <li class ="button"><a href="HOD_display.php">Display</a></li>

<li class ="button"><a href="logout.php"> LOGOUT</a></li>
                
    </ul>
   
  </nav>
</div>

<div class="wrapper row3">
  <main class="container clear"> 





<h2 align="center"> STUDENT DISCIPLINE ISSUES</h2>
<form action="" method="post">
<label>Student ID:</label><input type="text" name="student_id" required>
<label>Issue: </label><input type="text" name="issues" required>
<input type="submit" value="Add" name="submit">
</form>
<?php 

if(isset($_POST["submit"])){
 if(!empty($_POST['student_id']))
{
	$id=$_POST['student_id'];
 $issues = $_POST['issues'];

 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
 
 //Insert to Mysqli Query
 $query = mysqli_query($conn, "SELECT * FROM eligibility WHERE student_id='".$id."'");
 $numrows = mysqli_num_rows($query);
 if($numrows == 0)
  {
 $sql = "INSERT IGNORE INTO eligibility(student_id,issues) VALUES('$id','$issues')";
 if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
 } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
}
else
{
    $sql = "UPDATE eligibility SET issues='$issues' WHERE student_id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
