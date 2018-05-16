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
      <li class="button"><a href="comp_req">ADD Company</a></li>
	  
              <li class ="button"><a href="uni_req.php">University Requirement</a></li>
			  <li class ="active"><a href="eligibility.php">Eligibility List</a></li>
			  <li class ="button"><a href="req_display.php">Requirement List</a></li>
			  <li class ="button"><a href="allotment.php">Allot</a></li>

<li class ="button"><a href="logout.php"> LOGOUT</a></li>
                
    </ul>
   
  </nav>
</div>



<div class="wrapper row3">
  <main class="container clear"> 



<h2 align="center"> STUDENT ELIGIBILITY LIST</h2>
 <table class="table table-hover">
           <tr>
               <th>Student ID</th>
               <th>Student Name</th>
			   <th>Branch</th>
			   <th>CGPA</th>
			   <th>Gender</th>
           </tr>
		  
           
<?php
//if(isset($_POST["submit"])){
 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
 $query ="Select e.student_id, e.due, e.backlog, e.issues, e.withdrawal, e.undertaking, s.name,s.branch,s.cgpa,s.gender from eligibility e, student s where e.student_id = s.student_id";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
 		 $id=$row['student_id'];
		 $cgpa=$row['cgpa'];
		 $branch=$row['branch'];
		 $gender=$row['gender'];
		 $due=$row['due'];
		 $backlog=$row['backlog'];
		 $issues=$row['issues'];
		 $withdrawal=$row['withdrawal'];
		 $undertaking=$row['undertaking'];
		 
		 if($due=='0' && $backlog=='0' && $issues=='0' && $withdrawal=='0' && $undertaking=='given'){
		 $sql = "INSERT IGNORE INTO eligible_students(student_id,cgpa,branch,gender) VALUES('$id','$cgpa','$branch','$gender')";
	     mysqli_query($conn, $sql);
	 }
	 
 }
	 $query1 = "Select e1.student_id, s.student_id, s.name,e1.branch,e1.cgpa,e1.gender from eligible_students e1, student s where e1.student_id = s.student_id";
	 $result1=mysqli_query($conn,$query1);
	 if ($result1->num_rows > 0) {
	 while($row1=mysqli_fetch_array($result1)){
	 		 $id1=$row1['student_id'];
			 $name1=$row1['name'];
			 $branch1=$row1['branch'];
			 $cgpa1=$row1['cgpa'];
			 $gender1=$row1['gender'];
			 
		 ?>
		                   <tr>
						   <td><?php echo $id1 ;?></td> 
		                   <td><?php echo $name1 ?></td>
						   <td><?php echo $branch1 ?></td>
						   <td><?php echo $cgpa1 ?></td>
						   <td><?php echo $gender1 ?></td>
					   </tr>
		                 <?php
				     }
				 } else {
				     echo "0 results";
				 }
				 //}
				 ?>

		               </tr>
		        </table>
<form action="" method="post">
<label>ID no.:</label><input type="text" name="id">
<input type="submit" value="Remove Student" name="remove">
</form>
<p id="demo"></p>
</div>






</div>
    

<?php
if(isset($_POST["remove"])){
 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
 $id=$_POST['id'];
 $sql1 = "delete from eligible_students where student_id='$id'";
 mysqli_query($conn, $sql1);
 $sql = "UPDATE eligibility SET withdrawal='1' WHERE student_id='$id'";
 if (mysqli_query($conn, $sql)) {
     echo "removed successfully";
 } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
}
 ?>


  

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
