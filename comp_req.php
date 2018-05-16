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
      <li class="active"><a href="comp_req">ADD Company</a></li>
	  
              <li class ="button"><a href="uni_req.php">University Requirement</a></li>
			  <li class ="button"><a href="eligibility.php">Eligibility List</a></li>
			  <li class ="button"><a href="req_display.php">Requirement List</a></li>
			  <li class ="button"><a href="allotment.php">Allot</a></li>

<li class ="button"><a href="logout.php"> LOGOUT</a></li>
                
    </ul>
   
  </nav>
</div>

<div class="wrapper row3">
  <main class="container clear"> 





<h2 align="center"> COMPANY REQUIREMENTS </h2>
<form action="" method="post" enctype="multipart/form-data">
<label>Company ID:</label><input type="text" name="company_id" required>
<label>Company Name :</label><input type="text" name="company_name" pattern="[A-Z]*[a-z]*" required>
<label>Number of Students:</label><input type="text" name="no_of_students" size="2" pattern="[0-9]*" required>
<label>Consent given by :</label><input type="text" name="cgb" pattern="[A-Z]*[a-z]*" required>
<label>Consent obtained by:</label><input type="text" name="cob" pattern="[A-Z]*[a-z]*" required>
<label>Date of consent :</label><input type="date" name="doc" required value="yyyy-mm-dd">
<label>Phone :</label><input type="tel" name="phone" size="10" pattern="[0-9]{10}" required>
<label>Email :</label><input type="email" name="email" required>
<label>Website:</label><input type="text" name="website" required>
Branch:<input type="text" name="branch">
<label>Number of girls:</label><input type="text" name="no_of_girls" size="2" pattern="[0-9]*">
<label>Number of boys:</label><input type="text" name="no_of_boys" size="2" pattern="[0-9]*" >
<label>CGPA(if specified):</label><input type="text" name="cgpa" value="00.00">
<label>Nature of work:</label><input type="text" name="now">
<label>Weekly Holidays:</label><input type="text" name="wh" pattern="[A-Z]*[a-z]*">
<label>Working Hours:</label><input type="text" name="whrs">
<label>Address:</label><input type="var" name="address" required>

<input type="submit" value="Add" name="submit">
</form>

<?php 
if(isset($_POST["submit"])){
 if(!empty($_POST['company_id']))
{

$id = $_POST['company_id'];
$name = $_POST['company_name'];
$nos = $_POST['no_of_students'];
$nog = $_POST['no_of_girls'];
$nob = $_POST['no_of_boys'];
$cgb = $_POST['cgb'];
$cob = $_POST['cob'];
$doc = $_POST['doc'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$website = $_POST['website'];
$branch = $_POST['branch'];
$cgpa = $_POST['cgpa'];
$now = $_POST['now'];
$wh = $_POST['wh'];
$whrs = $_POST['whrs'];
$address = $_POST['address'];
 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
 //Selecting Database
 $query = mysqli_query($conn, "SELECT * FROM company_requirements WHERE company_id='".$id."'");
 $numrows = mysqli_num_rows($query);
 if($numrows == 0)
 
 {
 //Insert to Mysqli Query
 $sql = "INSERT IGNORE INTO company_requirements(company_id,company_name,date_of_consent,consent_given_by,consent_obtained_by,phone,email,branch,total_no_students,no_of_girls,no_of_boys,cgpa,nature_of_work,working_hrs,weekly_holidays,website,address) VALUES('$id','$name','$doc','$cgb','$cob','$phone','$email','$branch','$nos','$nog','$nob','$cgpa','$now','$whrs','$wh','$website','$address')";

 if (mysqli_query($conn, $sql)) {
	 echo "<script type='text/javascript'>alert ('New record created successfully');</script>";
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
