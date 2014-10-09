<?php
$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = '../uploads';   //2

if(!file_exists($storeFolder))
{
    mkdir($storeFolder, 0700);
}

if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];          //3             

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    $targetFile =  $targetPath. $_FILES['file']['name'];  //5

    move_uploaded_file($tempFile,$targetFile); //6

}
?>