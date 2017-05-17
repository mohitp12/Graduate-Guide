<?php
require './mysqlconfig.php';
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM sign_up";
$result = $conn->query($sql);

    // output data of each row
    if (isset($_POST['email']) && isset($_POST['password'])){
$email = $_POST['email'];
$password = $_POST ['password'];

$sql = "SELECT * FROM signup WHERE email = '".$email."' AND password = '".$password."' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION["login_session"]=$email;
    //echo $login_session;
    header("Refresh:0 ;url=http://localhost/GradeGuide/profile.html");
    exit();
}
else {    
    echo "<p style = 'color: red'> Please enter a valid username & password.</p>";
    //exit();
}
$conn->close();
    }
    else {    
    echo "<p style = 'color: red'> Please enter username & password.</p>";
    exit();
}
?>