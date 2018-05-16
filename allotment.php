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
			  <li class ="button"><a href="eligibility.php">Eligibility List</a></li>
			  <li class ="button"><a href="req_display.php">Requirement List</a></li>
			  <li class ="active"><a href="allotment.php">Allot</a></li>

<li class ="button"><a href="logout.php"> LOGOUT</a></li>
                
    </ul>
   
  </nav>
</div>
<div class="wrapper row3">
  <main class="container clear"> 



<h2 align="center"> ALLOTMENT LIST</h2>
 <table class="table table-hover">
           <tr>
               <th>Student ID</th>
               <th>Student Name</th>
			   <th>Company ID</th>
			   <th>Company Name</th>
           </tr>
           
<?php
 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
 //Selecting Database
 
 $sql1= "select e.cgpa, e.student_id, p.student_id, p.preference_no from preference p , eligible_students e where p.student_id=e.student_id order by e.cgpa desc";
 $result1=mysqli_query($conn,$sql1);
 if ($result1->num_rows > 0) {
 while($row1=mysqli_fetch_array($result1)){
 		 $id1=$row1['company_id'];
		 $name1=$row1['company_name'];
		 $branch1=$row1['branch'];
		 $cgpa1=$row1['cgpa'];
		 $total1=$row1['total_no_students'];
		 $girls1=$row1['no_of_girls'];
		 $boys1=$row1['no_of_boys'];
		 
	 
 
 $sql = "Select student_id_no,company_id_no from allotment";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 ?>
		                   <tr>
						   <td><?php echo $row['student_id']; ?></td> 
		                   <td><?php echo $row['name']; ?></td>
						   <td><?php echo $row['company_id']; ?></td> 
						   <td><?php echo $row['company_name']; ?></td> 
					   </tr>
		                 <?php
				     }
				 } else {
				     echo "0 results";
				 }
				 $conn->close();
				 ?>

		               </tr>
		        </table>

</div>






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
