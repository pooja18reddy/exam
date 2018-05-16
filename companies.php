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
      <li class="button"><a href="ip.html">IP</a></li>
              <li class ="active"><a href="companies.php">Companies</a></li>

<li class ="button"><a href="LOGIN.php"> LOGIN</a></li>
                
    </ul>
   
  </nav>
</div>



<div class="wrapper row3">
  <main class="container clear"> 



<h2 align="center"> Company Details</h2>
 <table class="table table-hover">
           <tr>
			   <th>Company ID</th>
               <th>Company Name</th>
               <th>About</th>
           </tr>
           
<?php

 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
 //Selecting Database
 $sql = "Select * from company_requirements";
$result = $conn->query($sql);
 //Result Message
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 ?>
		                   <tr>
						   <td><?php echo $row['company_id'];?></td> 
						   <td><?php echo $row['company_name'];?></td> 
						   <td><?php echo "Branch = ".$row['branch'].";\t";
							   		 echo "CGPA = ".$row['cgpa'].";\t";
									 echo "Nature_Of_Work = ".$row['nature_of_work'].";\t";
									 echo "Working_hours = ".$row['working_hrs'].";\t";
									 echo "Weekly_Holidays = ".$row['weekly_holidays'].";\t";
									 echo "Phone = ".$row['phone'].";\t";
									 echo "Email = ".$row['email'].";\t";
									 echo "Website = ".$row['wesite'].";\t";
									 echo "Address = ".$row['address'].";\t";
							   ?></td> 
		                   
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
