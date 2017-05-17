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

extract($_POST);

$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$email = $_SESSION["login_session"];
$subject = $_SESSION["subject"];
$sum = (0.3)*$a+(0.4)*$b +(0.3)*$c;

$sql="UPDATE student_details SET current_grade='$sum' WHERE email='$email' AND subject='$subject'";

if ($conn->query($sql) === TRUE) 
        {
            echo "";
        }
        else
        {
        echo "<p style = 'color: red'> Please enter a valid information.</p>";
            //exit();
	}
	$conn->close();

?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <div id="chart_div" style="width: 1000px;"></div>
        <script>
        
            google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.setOnLoadCallback(drawBasic);

            function drawBasic() {

                  var data = new google.visualization.DataTable();
                  data.addColumn('number', 'X');
                  data.addColumn('number', 'Marks');

                  var marks="<?php echo $sum; ?>";
                  
                  data.addRows([
                    [0, 0], [parseInt(marks),parseInt(marks)]
                  ]);

                  var options = {
                    hAxis: {
                      title: 'Marks'
                    },
                    vAxis: {
                      title: 'Marks'
                    }
                  };

                  var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

                  chart.draw(data, options);
                }
        
        </script>
	
    </body>
</html>