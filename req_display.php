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
			  <li class ="active"><a href="req_display.php">Requirement List</a></li>
			  <li class ="button"><a href="allotment.php">Allot</a></li>

<li class ="button"><a href="logout.php"> LOGOUT</a></li>
                
    </ul>
   
  </nav>
</div>
<div class="wrapper row3">
  <main class="container clear"> 



<h2 align="center">Requirement List</h2>
 <table class="table table-hover">
           <tr>
               <th>Company ID</th>
			   <th>Company Name</th>
               <th>CGPA</th>
			   <th>No. of Students</th>
			   <th>No. of Girls</th>
			   <th>No. of Boys</th>
			   <th>Branch</th>
           </tr>
           
<?php
//if(isset($_POST["submit"])){
 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
	 $query1 = "Select company_id, company_name, cgpa, total_no_students, no_of_girls, no_of_boys, branch from company_requirements";
	 $result1=mysqli_query($conn,$query1);
	 if ($result1->num_rows > 0) {
	 while($row1=mysqli_fetch_array($result1)){
	 		 $id1=$row1['company_id'];
			 $name1=$row1['company_name'];
			 $branch1=$row1['branch'];
			 $cgpa1=$row1['cgpa'];
			 $total1=$row1['total_no_students'];
			 $girls1=$row1['no_of_girls'];
			 $boys1=$row1['no_of_boys'];
			 
		 ?>
		                   <tr>
						   <td><?php echo $id1 ?></td> 
		                   <td><?php echo $name1 ?></td>
						   <td><?php echo $cgpa1 ?></td>
						   <td><?php echo $total1 ?></td>
						   <td><?php echo $girls1 ?></td>
						   <td><?php echo $boys1 ?></td>
						   <td><?php echo $branch1 ?></td>
						   
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
