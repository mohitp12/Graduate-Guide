<?php

require './mysqlconfig.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();// Starting Session

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$email = $_SESSION["login_session"];
$subject = $_SESSION["subject"];

$query = $conn->query("SELECT signup.name, student_details.* FROM signup INNER JOIN student_details on signup.email=student_details.email where signup.email='$email'");

$services = array();

while($row = $query->fetch_object())
{
    $services [] = $row;
}

?>

 <!DOCTYPE html>
   <html lang="en">
   <head>
   <title>Grade Guide</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body id="page1">
<!-- START PAGE SOURCE -->
<div class="wrap">
  <header>
   <img src="images/logo.png" alt="logo" style="width:200px; height:67px; margin-left: 25%; margin-top:20px;"></img><br/><br/>
    <div class="container">
      
      <nav>
        <ul>
          <li class="current"><a href="index.html" class="m1">Home Page</a></li>
          <li><a href="about-us.html" class="m2">About Us</a></li>
		  <li><a href="contact-us.html" class="m4">Contact Us</a></li>
		    <li class="last"><a href="sitemap.html" class="m5">Sitemap</a></li>
                   
          <li class="last"><a href="login.html" class="m5">Logout</a></li>
        </ul>
      </nav>
	    <fieldset>
          <div class="rowElem">
          
       
        </fieldset>
      </form>
    </div>
  </header>
  <div class="container">
    <aside>
      <h3>Categories</h3>
      <ul class="categories">
        <li><span><a href="course.html">Programs</a></span></li>
        <li><span><a href="student-info.php">Student Info</a></span></li>
        <li class="last"><span><a href="calender.html">Calendar</a></span></li>
      </ul>
    
        <fieldset>
          
        </fieldset>
      </form>

    </aside>
    <section id="content">
    <div id="banner">
  <h2>Professional <span>Online Education <span>Grading Guide</span></span></h2>
     </div>

  <h2>Student<span>Information</span></h2>
	
	<table style= border 1px solid black>
	<tr >
	
	<td>
	<img src="C:\wamp64\www\GradeGuide\images\profile.png" alt="Profile picture" width=200 height=200>
	</td>
	
	

    <td>  
	<?php foreach($services as $service):?>
	
    <fieldset class="stuInfo">
    <div class="stuInfo-display-label">
        Student Name:<?php echo $service->name; ?></div>
    
    
    <div class="stuInfo-display-label">
        Email:<?php echo $service->email; ?></div>
    
   
        <div class="stuInfo-display-label">
            Course:<?php echo $service->subject; ?></div>
        <div class="stuInfo-display-field">
     Semester: 2015 Fall - MSCS (International Student)        
	 </div>
	 <hr>
	 <?php endforeach; ?>
	
	 </td>
	 </tr> 
	 </table>
        

  <div class="footerlink">
    <p class="lf">Copyright &copy; 2016 <a href="#">Grade Guide</a> - All Rights Reserved</p>
	<span id="loadingtime"></span>

        <div style="clear:both;"></div>
  </div>
</footer>

</html>