<?php                  
$filesnametemp = $_FILES['image']['tmp_name'];
$filenameNew = uniqid('', true) . "." . $ext;
$fileDestination = 'uploads/' . $filenameNew;
move_uploaded_file($filesnametemp, $fileDestination);
?>