<?php
include_once 'pdo_classes.php';
include_once 'file_upload_classes.php';
$pdoObject = new mySql();
$connection = $pdoObject->connectToDb();
$name = $_POST['name'];
$email = $_POST['email'];
//if ( '' != $email && '' != $name) {
//    $sqlQuery = "Insert into users(username ,email) VALUES ('$name','$email')";
//
//    $pdoObject->insertQuery($connection, $sqlQuery);
//}

for($fileCounter = 0; $fileCounter < count($_FILES["file"]["name"]); $fileCounter++){
        $fileTempName = $_FILES["file"]["tmp_name"][$fileCounter];
        $type=$_FILES["file"]["type"][$fileCounter];
        $fileName= $_FILES['file']['name'][$fileCounter];
        $fileSize=$_FILES['file']['size'][$fileCounter];
        fileUpload($fileTempName, $fileName,$fileSize);
}