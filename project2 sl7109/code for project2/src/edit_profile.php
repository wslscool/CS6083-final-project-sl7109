<?php
//搞一个表单
//每次进行更新，新的插入成功，就把就得删除
//先查询旧的 记住id
//再插入新的  成功删除旧的  失败就不删除
require_once("../dbs/profile_db.php");

$self = $_POST["self"];
$family = $_POST["family"];
$imgname = $_FILES['img']['name'];
// $tmp = $_FILES['myfile']['tmp_name'];
//$filepath = '/tmp/';  //文件存储路径
$filepath = '/var/www/html/src/photo/';  //文件存储路径



$destination = "***";
$uploadedFile = $_FILES['img']['tmp_name'];

if(file_exists($uploadedFile))  //如果上传了图片就操作 保存
{
    $destination = $imgname;    //插入数据库img path
    $re = move_uploaded_file($uploadedFile, $filepath.$destination);
    echo  "ok!!! ";
}else
{
   echo "img file upload failed";
   exit();
}

session_start();
$uid = $_SESSION["uid"];
$pid = -1;
$pid = check_profile_db($uid); //如果已经存在profile  直接覆盖


$re = alter_profile($uid,$self,$family,$destination);

if($re==0)
{

}else{
    if(pid == -1)  //是否需要删除旧的
    {
        echo "profile alter success! <a href = 'main.php'>return to main page</a>";
    }else{
        delete_old_profile($pid);
        echo "profile alter success! <a href = 'main.php'>return to main page</a>";
    }
 
}


?>