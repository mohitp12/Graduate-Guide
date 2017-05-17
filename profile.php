<?php
require './mysqlconfig.php';
session_start();


$error='Not Runnable'; // Variable To Store Error Message

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['subject']) && isset($_POST['aimed_grade'])){
$subject = $_POST['subject'];
$aimed_grade = $_POST['aimed_grade'];
$email = $_SESSION["login_session"];

	$sql="INSERT INTO student_details(email, subject, aimed_grade) VALUES('$email','$subject','$aimed_grade')";
        
    if ($conn->query($sql) === TRUE) 
        {
            $_SESSION["subject"]=$subject;
            echo "New record created successfully";
            header("Refresh:0 ;url=http://localhost/GradeGuide/index.html");
            exit();
	}
	else 
        {    
            echo "<p style = 'color: red'> Please enter a valid information.</p>";
            //exit();
	}
	$conn->close();
}

?>