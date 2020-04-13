<?php
include '../includes/connect.php';
  include '../includes/session.php';
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $imageProperties = getimageSize($_FILES['image']['tmp_name']);
        $mimetype = mime_content_type($_FILES['image']['tmp_name']);
        $imagename = $_FILES['image']['name'];

        $file1 = explode(".", $imagename);
        $ext = $file1[1];
        $allowed = array("jpg", "png", "jpeg");
        if (in_array($ext, $allowed)) {
            include("upload_file.php");
        }
    }
}

$name = $_POST['name'];
$price = $_POST['price'];
$sql = "INSERT INTO items (name, price,img_location) VALUES ('$name', $price,'$fileDestination')";
$con->query($sql);
header("location: ../admin-page.php");
?>