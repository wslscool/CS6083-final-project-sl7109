<?php

//var_dump($_FILES);
    $imgname = $_FILES['myfile']['name'];
   // $tmp = $_FILES['myfile']['tmp_name'];
    $filepath = '/tmp/';  //文件存储路径


$uploadedFile = $_FILES['myfile']['tmp_name'];
$destination = $filepath.$imgname;

if(file_exists($uploadedFile))
{
    $re = move_uploaded_file($uploadedFile, $destination);
    echo  "ok!!!";
}
else
{
   echo "file upload failed";
   exit();
}


?>
