<?php
session_start();

?>
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
	  
              <li class ="active"><a href="preference.php">Preference</a></li>
			  <li class ="button"><a href="logout.php"> LOGOUT</a></li>
			  

                
    </ul>
   
  </nav>
</div>



<div class="wrapper row3">
  <main class="container clear"> 





<h2 align="center"> PREFERENCE FORM </h2>
<form action="" method="post" enctype="multipart/form-data">
      <table class="">
        <thead>
          <tr>
			  <th>Company Id</th>
            <th>Company Name</th>
            <th>Preference No.</th>
          </tr>
        </thead>
        <tbody>
          <?php
	  	$conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
	  	$db = mysqli_select_db($conn, 'IP') or die("DB Error");
	  	$query1 ="select company_name,company_id from company_requirements;";
	  	$result1=mysqli_query($conn,$query1) or die("error1");
		$limit=mysqli_num_rows($result1);
        for ($i=1; $i<= $limit; $i++) {
          $row=mysqli_fetch_array($result1);
		 $u=$_SESSION['user'];
		$cid=$row['company_id'];
		$cname= $row['company_name'];
        ?>
            <tr>
              <td><?php echo $cid ;?></td>
              <td><?php echo $cname; ?></td>
              <td>
				  
               <select>
                  <option value="0">select</option>
                  <?php for ($j=1; $j<= $limit; $j++) { ?>
                    <option value="<?php echo $j ?>" name="pref"><?php echo $j ?></option>
					 <?php 
	   			  $sql1 = "INSERT INTO preference(company_id,student_id,preference_no) VALUES('$cid','$cname','$j')";
	   			  mysqli_query($conn, $sql1);
                  } ?>
                </select>

              </td>
            </tr>
              <?php 
			  
			 
		  } ?>
        </tbody>
		
      </table>
	  
	<input type="submit" name="submit" value="Submit">
	<input type="reset" name="reset" value="reset">
    </form>

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
