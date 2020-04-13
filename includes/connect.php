<?php
session_start();
// $servername = "localhost";
// $server_user = "root";
// $server_pass = "123456";
// $dbname = "food";

// $server_user = "id12571370_root";
// $server_pass = "Himadri@2898";
// $dbname = "id12571370_food";

$server_user = "jwoctotz";
$server_pass = "WoR3$9Lk5M7a4$1!";
$dbname = "jwoctotz_food";
$db_port        = '3306';

// $name = $_SESSION['name']; 
// $role = $_SESSION['role'];
// $con = new mysqli($servername, $server_user, $server_pass, $dbname);
$con = mysqli_connect("localhost", $server_user, $server_pass, $dbname, $db_port); 
// $con = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $server_user, $server_pass);
// $con = new PDO("mysql:host=localhost;port=3306;dbname=jwoctotz_food", 'jwoctotz', 'WoR3$9Lk5M7a4$1!');


?>