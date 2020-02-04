<?php

require_once("conn_db.php");


// `mid` INT UNSIGNED AUTO_INCREMENT,
//    `type` INT NOT NULL,
//    `sender_id`  INT NOT NULL,
//     `receiver_id` INT NOT NULL,
//     `title` VARCHAR(40) ,
//     `body` VARCHAR(200) ,
//     `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `location` bool ,
//    `status`  INT NOT NULL,



//规定返回值为 id  title body location[直接返回字符串]
// 选择时筛选条件  id type status
function get_unread_friend_mess($Uid)
{

    $conn = conn_db();
    $re = array();
    $count=0;
    
    // 预处理及绑定
    $stmt = $conn->prepare("select sender_id,mid,title,body,location from Message where type = 3 and  status = 0 and receiver_id =? ");
    $stmt->bind_param("i", $uid);

    // 设置参数并执行
    $uid = $Uid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($sender,$mid,$title,$body,$location);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
            $uname =get_user_name($sender);
            $re[$count] = array("sender"=>$sender,"uname"=>$uname,"mid"=>$mid,"title"=>$title,"body"=>$body,"loca"=>$location);
            $count = $count+1;
        }
     }

//var_dump($re);

     //遍历数组处理 location的问题
     foreach ($re as $key => $value) {

      if($value["loca"] == 1)
      {
          //echo "yes";
          //$tmp = "dddd";
          $tmp = get_city_and_street($value["sender"]);
          $re[$key]["loca"]=$tmp;
      }else{
          //echo "no";
          $re[$key]["loca"]="Private";
      }
    }

     $re_mid = array();
    //将所有需要发送信息的mid拿到  设置为已读
    foreach ($re as $key => $value) {
        array_push($re_mid,$value["mid"]);
    }

    set_mess_read($re_mid);
   // var_dump($re_mid);
    //将处理完成的结果返回到前端
     return $re;
}



function get_unread_neighbor_mess($Uid)
{

    $conn = conn_db();
    $re = array();
    $count=0;
    
    // 预处理及绑定
    $stmt = $conn->prepare("select sender_id,mid,title,body,location from Message where type = 4 and  status = 0 and receiver_id =? ");
    $stmt->bind_param("i", $uid);

    // 设置参数并执行
    $uid = $Uid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($sender,$mid,$title,$body,$location);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
            $uname =get_user_name($sender);
            $re[$count] = array("sender"=>$sender,"uname"=>$uname,"mid"=>$mid,"title"=>$title,"body"=>$body,"loca"=>$location);
            $count = $count+1;
        }
     }




     //遍历数组处理 location的问题  id -> name
     foreach ($re as $key => $value) {

      if($value["loca"] == 1)
      {
          //echo "yes";
          //$tmp = "dddd";
          $tmp = get_city_and_street($value["sender"]);  //返回city和street的数组   
          $string = "city:   ".$tmp[0]."<br>street:   ".$tmp[1];  // 将数组拼接起来
          $re[$key]["loca"]=$string;
      }else{
          //echo "no";
          $re[$key]["loca"]="Private";
      }
    }


    $re_mid = array();
    //将所有需要发送信息的mid拿到  设置为已读
    foreach ($re as $key => $value) {
        array_push($re_mid,$value["mid"]);
    }

    set_mess_read($re_mid);
   // var_dump($re_mid);
    //将处理完成的结果返回到前端
     return $re;


}



function get_unread_block_mess($Uid)
{

    $conn = conn_db();
    $re = array();
    $count=0;
    
    // 预处理及绑定
    $stmt = $conn->prepare("select sender_id,mid,title,body,location from Message where type = 5 and  status = 0 and receiver_id =? ");
    $stmt->bind_param("i", $uid);

    // 设置参数并执行
    $uid = $Uid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($sender,$mid,$title,$body,$location);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
            $uname =get_user_name($sender);
            $re[$count] = array("sender"=>$sender,"uname"=>$uname,"mid"=>$mid,"title"=>$title,"body"=>$body,"loca"=>$location);
            $count = $count+1;
        }
     }




     //遍历数组处理 location的问题  id -> name
     foreach ($re as $key => $value) {

      if($value["loca"] == 1)
      {
          //echo "yes";
          //$tmp = "dddd";
          $tmp = get_city_and_street($value["sender"]);  //返回city和street的数组   
          $string = "city:   ".$tmp[0]."<br>street:   ".$tmp[1];  // 将数组拼接起来
          $re[$key]["loca"]=$string;
      }else{
          //echo "no";
          $re[$key]["loca"]="Private";
      }
    }


    $re_mid = array();
    //将所有需要发送信息的mid拿到  设置为已读
    foreach ($re as $key => $value) {
        array_push($re_mid,$value["mid"]);
    }

    set_mess_read($re_mid);
   // var_dump($re_mid);
    //将处理完成的结果返回到前端
     return $re;



}





function get_unread_hood_mess($Uid)
{

    $conn = conn_db();
    $re = array();
    $count=0;
    
    // 预处理及绑定
    $stmt = $conn->prepare("select sender_id,mid,title,body,location from Message where type = 6 and  status = 0 and receiver_id =? ");
    $stmt->bind_param("i", $uid);

    // 设置参数并执行
    $uid = $Uid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($sender,$mid,$title,$body,$location);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
            $uname =get_user_name($sender);
            $re[$count] = array("sender"=>$sender,"uname"=>$uname,"mid"=>$mid,"title"=>$title,"body"=>$body,"loca"=>$location);
            $count = $count+1;
        }
     }




     //遍历数组处理 location的问题  id -> name
     foreach ($re as $key => $value) {

      if($value["loca"] == 1)
      {
          //echo "yes";
          //$tmp = "dddd";
          $tmp = get_city_and_street($value["sender"]);  //返回city和street的数组   
          $string = "city:   ".$tmp[0]."<br>street:   ".$tmp[1];  // 将数组拼接起来
          $re[$key]["loca"]=$string;
      }else{
          //echo "no";
          $re[$key]["loca"]="Private";
      }
    }


    $re_mid = array();
    //将所有需要发送信息的mid拿到  设置为已读
    foreach ($re as $key => $value) {
        array_push($re_mid,$value["mid"]);
    }

    set_mess_read($re_mid);

   // var_dump($re_mid);
    //将处理完成的结果返回到前端
     return $re;
}



function get_unread_block_request($Uid)
{

//     //type = 1  status =0  receiver_id
// $sender_list = get_unread_block_request($uid);
// //先把 sender list 查出来   
// //如果用户没有操作就是拒绝了
// //如果用户同意了，就查找记录用户申请的block  list  进行查询  先判断是否满足条件，如果满足条件直接修改用户的block和hood id
// //否则修改一下 block list  记录一下  就可以了

 $conn = conn_db();
    $re = array();
    $count=0;
    
    // 预处理及绑定
    $stmt = $conn->prepare("select sender_id,mid from Message where type = 1 and  status = 0 and receiver_id =? ");
    $stmt->bind_param("i", $uid);

    // 设置参数并执行
    $uid = $Uid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($sender,$mid);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
            $uname =get_user_name($sender);
            $re[$count] = array("sender"=>$sender,"uname"=>$uname,"mid"=>$mid);
            $count = $count+1;
        }
     }



    $re_mid = array();
    //将所有需要发送信息的mid拿到  设置为已读
    foreach ($re as $key => $value) {
        array_push($re_mid,$value["mid"]);
    }

    set_mess_read($re_mid);
    
   // var_dump($re_mid);
    //将处理完成的结果返回到前端
     return $re;
     
}



//将列表中的mid都设置成已读
function set_mess_read($arr){

//遍历数组将所有消息设为已读
$conn = conn_db();
//UPDATE Message SET status = 1 WHERE mid = ?

foreach ($arr as $key => $value) {
    // 预处理及绑定
    $stmt = $conn->prepare("UPDATE Message SET status = 1 WHERE mid = ? ");
    $stmt->bind_param("i", $mid);

    // 设置参数并执行
    $mid = $value;
    $stmt->execute();
     
}

}





//规定搜索只能搜索到未读消息，但是消息状态不会被改变
function get_key_search_message($Keyword,$Uid)
{
    $conn = conn_db();
    $re = array();
    $count=0;
    
    // select sender_id,mid,title,body,location from Message where   status = 0 and receiver_id =? and body like '%?%'
    // 预处理及绑定
    // select sender_id,mid,title,body,location from Message where status = 0 and receiver_id =2 and body like '%con%' 
    $stmt = $conn->prepare("select sender_id,mid,title,body,location from Message where status = 0 and receiver_id =? and body like CONCAT('%',?,'%') ");
    $stmt->bind_param("is", $uid,$key);

    // 设置参数并执行
    $uid = $Uid;
    $key = $Keyword;

    // $stmt = $conn->prepare("select sender_id,mid,title,body,location from Message where status = 0 and receiver_id =2 and body like CONCAT('%',?,'%')  ");
    // $stmt->bind_param("s", $key);
    // $key = $Keyword;


    $stmt->execute();
    if ($stmt->error) {
        var_dump($stmt->error);
    }

    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "no result!";
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($sender,$mid,$title,$body,$location);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
            $uname =get_user_name($sender);
            $re[$count] = array("sender"=>$sender,"uname"=>$uname,"mid"=>$mid,"title"=>$title,"body"=>$body,"loca"=>$location);
            $count = $count+1;
        }
     }


   //  var_dump($re);
     
     //遍历数组处理 location的问题  id -> name
     foreach ($re as $key => $value) {

        if($value["loca"] == 1)
        {
            //echo "yes";
            //$tmp = "dddd";
            $tmp = get_city_and_street($value["sender"]);  //返回city和street的数组   
            $string = "city:   ".$tmp[0]."<br>street:   ".$tmp[1];  // 将数组拼接起来
            $re[$key]["loca"]=$string;
        }else{
            //echo "no";
            $re[$key]["loca"]="Private";
        }
      }
  
  
    //   $re_mid = array();
    //   //将所有需要发送信息的mid拿到  设置为已读
    //   foreach ($re as $key => $value) {
    //       array_push($re_mid,$value["mid"]);
    //   }
  
    //   set_mess_read($re_mid);
  
     // var_dump($re_mid);
      //将处理完成的结果返回到前端
       return $re;

}


//get_key_search_message("con",2);


function send_sb_message($Sender,$Reciever,$Title,$Body,$Loca,$Type)
{

    $conn = conn_db();


    
    // 预处理及绑定
    //select sender_id,mid,title,body,location from Message where status = 0 and receiver_id =? and body like CONCAT('%',?,'%') 
    $stmt = $conn->prepare("INSERT INTO Message(sender_id,receiver_id, title , body ,location,status,type) VALUES  ( ?,?,?,?,?,0,?) ");
    $stmt->bind_param("iissii", $sender,$reciever,$title,$body,$loca,$type);

    // 设置参数并执行
    $sender = $Sender;
    $reciever = $Reciever;
    $title = $Title;
    $body = $Body;
    $loca = $Loca;
    $type = $Type;



    $stmt->execute();

     if($stmt)
     {
         //echo "注册成功，请返回登陆";
         return 1;
     }else{
        // echo "执行失败";
         return 0;
     }
    
    $stmt->close();
    $conn->close();

}







?>
