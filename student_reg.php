<!DOCTYPE html>

<html>
<head>
<title>CAA</title>
<meta charset="utf-8">

<link href="layout.css" rel="stylesheet" type="text/css" media="all">

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
      <li class="button"><a href="ip.html">IP</a></li>
              <li class ="button"><a href="companies.php">Companies</a></li>

<li class ="button"><a href="LOGIN.php"> LOGIN</a></li>
                
    </ul>
   
  </nav>
</div>


<div class="wrapper row3">
  <main class="container clear"> 





<h2 align="center"> Student Registration </h2>
<form action="" method="post" enctype="multipart/form-data">
Name:	<input type="text" name="name" pattern="[A-Z]*[a-z]*" required></br>
ID :<input type="text" name="id" required></br>
Password :<input type="password" name="password" required></br>
DOB:<input type="date" name="dob" required value="yyyy-mm-dd"></br>
Branch:<select name="branch" required>
        <option value="CSE">CSE</option>
        <option value="MEE">MEE</option>
		<option value="ECE">ECE</option>
		<option value="EEE">EEE</option>
		<option value="CVE">CVE</option>
		<option value="PEE">PEE</option>
    </select></br>
CGPA :<input type="text" name="cgpa" value="00.00" required>
E-mail :<input type="email" name="email" required></br>
Phone :<input type="text" name="phone_1" size="10" pattern="[0-9]{10}" required title="you can enter only 10 digits...."></br>
Emergency Contact Person:<input type="text" name="name1" pattern="[A-Z]*[a-z]*" required></br>
Relation(with emergency contact person):<input type="text" name="rel" pattern="[A-Z]*[a-z]*" required></br>
Emergency Phone :<input type="tel" name="phone_2" size="10" pattern="[0-9]{10}" required></br>
Address :<input type="var" name="address" required></br>
Gender  :<select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
		<option value="Others">Others</option>
    </select></br>
Blood Group:<select name="blood_group" required>
        <option value="A+"> A+</option>
        <option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="AB+">AB+</option>
		<option value="AB-">AB-</option>
		<option value="O+">O+</option>
		<option value="O-">O-</option>

    </select></br>
	
	<p><strong>NOTE: Please check your details for correctness before submitting</strong></p>
<input type="submit" value="Register" name="submit">
</form>
<?php

if(isset($_POST["submit"])){
 if(!empty($_POST['id']))
{
$id = $_POST['id'];
 $password= $_POST['password'];
 $name = $_POST['name'];
 $email = $_POST['email'];
 $cgpa = $_POST['cgpa'];
 $phone_1 = $_POST['phone_1'];
$phone_2 = $_POST['phone_2'];
 $address = $_POST['address'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$ecp = $_POST['name1'];
$rel = $_POST['rel'];
$branch = $_POST['branch'];
$bgp = $_POST['blood_group'];

 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
 //Selecting Database
 $query = mysqli_query($conn, "SELECT * FROM login WHERE username='".$id."'");
 $numrows = mysqli_num_rows($query);
 if($numrows == 0)
  {
 //Insert to Mysqli Query
 $sql = "INSERT IGNORE INTO student(student_id,name,cgpa,gender,date_of_birth,address,mobile,branch,email_id,blood_group,em_name,em_relation,em_contact,password)VALUES('$id','$name','$cgpa','$gender','$dob','$address','$phone_1','$branch','$email','$bgp','$ecp','$rel','$phone_2','$password')";
 $res=mysqli_query($conn,$sql) or die("error");
 
 $sql1 = "INSERT INTO login(category_id,username,password) VALUES(2,'$id','$password')";
 $result = mysqli_query($conn, $sql1) or die("err");
 



 if($result && $res){
	 echo "<script type='text/javascript'>alert ('You have registered yourself successfully');</script>";
 }
 else
 {
 echo "<script type='text/javascript'>alert ('Failed! Please retry.');</script>";
 }
 }
 else
 {
	 echo "<script type='text/javascript'>alert ('That Username already exists! Please try again.');</script>";

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
