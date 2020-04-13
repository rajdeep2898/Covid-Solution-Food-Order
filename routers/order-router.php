<?php
include '../includes/connect.php';
  include '../includes/session.php';
include '../includes/wallet.php';
$total = 0;
$address = htmlspecialchars($_POST['address']);
$description =  htmlspecialchars($_POST['description']);
$time_slot =  htmlspecialchars($_POST['slot']);
// echo "test";
// echo $time_slot;
// echo "test";

$payment_type = $_POST['payment_type'];
$total = $_POST['total'];
	$sql = "INSERT INTO orders (customer_id, payment_type, address,slot,total, description) VALUES ($user_id, '$payment_type', '$address','$time_slot', $total, '$description')";
	if ($con->query($sql) === TRUE){
		$order_id =  $con->insert_id;
		foreach ($_POST as $key => $value)
		{
			if(is_numeric($key)){
			$result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
			while($row = mysqli_fetch_array($result))
			{
				$price = $row['price'];
			}
				$price = $value*$price;
			$sql = "INSERT INTO order_details (order_id, item_id, quantity, price) VALUES ($order_id, $key, $value, $price)";
			$con->query($sql) === TRUE;
			$result1 = mysqli_query($con, "SELECT * FROM delevery WHERE id=$time_slot") or die("<b>Error:</b> Problem on Image Insert1<br/>" . mysqli_error($con));
			while ($row1 = mysqli_fetch_array($result1)) {
			
			$fill = $row1['fill'];
			$fill=$fill+1;
			$result2 = mysqli_query($con, "UPDATE delevery SET fill=$fill WHERE id=$time_slot") or die("<b>Error:</b> Problem on Image Insert2<br/>" . mysqli_error($con));
			}
		}
		}
		if($_POST['payment_type'] == 'Wallet'){
		$balance = $balance - $total;
		$sql = "UPDATE wallet_details SET balance = $balance WHERE wallet_id = $wallet_id;";
		$con->query($sql) === TRUE;
		}
			header("location: ../orders.php");
	}

?>