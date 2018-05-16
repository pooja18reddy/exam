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
      <li class="button"><a href="uni_req.php">ADD</a></li>
              <li class ="active"><a href="uni_display.php">Display</a></li>

<li class ="button"><a href="req_display.php"> Requirement List</a></li>
                
    </ul>
   
  </nav>
</div>
<div class="wrapper row3">
  <main class="container clear"> 



<h2 align="center">Updated List</h2>
 <table class="table table-hover">
           <tr>
               <th>Company ID</th>
			   <th>Company_name</th> 
			   <th>No. of Students</th>
			   <th>No. of girls</th>
			   <th>No. of boys</th>
           </tr>
           
<?php

 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
 //Selecting Database
 $sql = "Select u.company_id,c.company_name,u.total_no,u.no_of_girls,u.no_of_boys from company_requirements c,university_requirement u where u.company_id=c.company_id";
 $result = $conn->query($sql);
 //Result Message
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 ?>
		                   <tr>
						   <td><?php echo $row['company_id']; ?></td> 
						   <td><?php echo $row['company_name'];?></td> 
						   <td><?php echo $row['total_no']; ?></td> 
		                   <td><?php echo $row['no_of_girls']; ?></td>
						   <td><?php echo $row['no_of_boys']; ?></td>
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
