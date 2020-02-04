<?php
include "../dbs/register_db.php";
//var_dump($_POST);
//register.php function
//check username unique
// php libsudim hash
// pass data to dbs
// tell user register or not

//array(6) { ["firstname"]=> string(2) "44" ["lastname"]=> string(2) "33" 
//["email"]=> string(17) "2939906971@qq.com" ["password> string(2) "22" ["city"]=> string(1) "0" ["street"]=> string(1) "4" }
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$email = $_POST["email"];
$passwd = $_POST["password"];
$city_id = $_POST["city"];
$street_id = $_POST["street"];

$name = $fname ." ". $lname;


//check username unique
 $unique = check_user_name($name);
 //echo $unique;
 if($unique == 0)
 {
     echo "your username used,choose another one";
     return -1;
 }else{
     //echo "yes";
 }

//  #todo
//echo $passwd;
$passwd_hash = password_hash($passwd,PASSWORD_DEFAULT);


 $re = register_db($name,$email,$city_id,$street_id,$passwd_hash);
 if($re==1)
 {
    echo "register success! <a href = ' http://47.111.29.63/src/index.html'>return to login</a>";
 }
 else{
     echo "register failed! <a href = ' http://47.111.29.63/src/index.html'>please retry</a>";
 }
 //echo $re;
?>
