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
      <li class="active"><a href="uni_req.php">ADD</a></li>
              <li class ="button"><a href="uni_display.php">Display</a></li>

<li class ="button"><a href="req_display.php"> Requirement List</a></li>
                
    </ul>
   
  </nav>
</div>

<div class="wrapper row3">
  <main class="container clear"> 





<h2 align="center"> UNIVERSITY REQUIREMENTS </h2>
<form action="" method="post" enctype="multipart/form-data">
<label>Company ID:</label><input type="text" name="company_id" required>
<label>Number of Students:</label><input type="text" name="no_of_students" size="2" pattern="[0-9]*"required>
<label>Number of girls:</label><input type="text" name="girls" size="2" pattern="[0-9]*">
<label>Number of boys:</label><input type="text" name="boys" size="2" pattern="[0-9]*">
<input type="submit" value="Add" name="submit">
</form>
<?php 
if(isset($_POST["submit"])){
 if(!empty($_POST['company_id']))
{
$id=$_POST['company_id'];
$total = $_POST['no_of_students'];
$girls = $_POST['girls'];
$boys = $_POST['boys'];
 

 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
 $query=mysqli_query($conn,"select company_id, total_no_students, no_of_girls, no_of_boys from company_requirements where company_id='$id'");
 $numrows = mysqli_num_rows($query);
 if($numrows == 1){
	 $row=mysqli_fetch_array($query);
		 $total_c=$row['total_no_students'];
		 $girls_c=$row['no_of_girls'];
		 $boys_c=$row['no_of_boys'];
	 if(intval($total_c) < intval($total)){
		 echo $total_c;
	     $sql1 = "UPDATE company_requirements SET total_no_students='$total_c' WHERE company_id='$id'";
	     mysqli_query($conn, $sql1);	 
}
	 if(intval($girls_c)<intval($girls)){
	     $sql2 = "UPDATE company_requirements SET no_of_girls='$girls_c' WHERE company_id='$id'";
	     mysqli_query($conn, $sql2);	 
}
	 if(intval($boys_c)<intval($boys)){
	     $sql3 = "UPDATE company_requirements SET no_of_boys='$boys_c' WHERE company_id='$id'";
	     mysqli_query($conn, $sql3);	 
}
echo "update successful";
}
else{
echo "Invalid Company ID";	
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
