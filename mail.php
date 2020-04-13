<?php
$msg = "ckjdbcs dksdjbckdsj ckjdbdskj test";
$msg = wordwrap($msg, 70);
mail("rajdeep2898@gmail.com", "my subject", $msg);

$sql = "UPDATE orders SET status='$status' WHERE id=$id;";
$mail_result = mysqli_query($con, "SELECT * FROM orders WHERE id=$id") or die("<b>Error:</b> Problem on Image Insert1<br/>" . mysqli_error($con));
while ($row1 = mysqli_fetch_array($mail_result)) {
    $customer_id = $row1['customer_id'];
    $slot = $row1['slot'];
    $total = $row1['total'];
    $status = $row1['status'];

    $slot_result = mysqli_query($con, "SELECT * FROM delevery WHERE id=$slot") or die("<b>Error:</b> Problem on Image Insert1<br/>" . mysqli_error($con));
$row_slot = mysqli_fetch_array($slot_result);

    $slot_name = $row_slot['slot'];

    $users_result = mysqli_query($con, "SELECT * FROM users WHERE id=$customer_id") or die("<b>Error:</b> Problem on Image Insert1<br/>" . mysqli_error($con));
    $row_users = mysqli_fetch_array($users_result);

    $name = $row_users['name'];
    $email = $row_users['email'];

    $message .= "Hi ". $name ." .\n ";
    $message .= "Your Order is". $status." .\n ";
    $message .= "Your Order Slot is " . $slot_name . " .\n ";
    $message .= "Your Total Value is Rs-" . $total . " .\n ";
    $message .= "Thankyou and Have a nice day";




     $msg = nl2br($message);
    mail($email, "Order Summary", $msg);


}

?>