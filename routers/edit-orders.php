<?php
include '../includes/connect.php';
  include '../includes/session.php';
$status = $_POST['status'];
$id = $_POST['id'];

$sql = "UPDATE orders SET status='$status' WHERE id=$id;";
$con->query($sql);
include '../mail.php';


header("location: ../all-orders.php");
?>