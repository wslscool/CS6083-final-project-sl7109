<?php



error_reporting(E_ALL);
ini_set("display_errors", 1);


function conn_db()
{
$conn = mysqli_connect('127.0.0.1','root','123tmp');
mysqli_select_db($conn,'Web');
return $conn;
}



function get_city_and_street($Uid)
{
     
    $conn = conn_db();
    $re = array();
    
    // 预处理及绑定
    $stmt = $conn->prepare("select address_city_id, address_street_id from User where uid=? ");
    $stmt->bind_param("i", $uid);

    // 设置参数并执行
    $uid = $Uid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "cannnot find user who send message ".$uid;
         exit();
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($cid,$sid);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据

            $cname = get_city_name($cid);
            $sname = get_Street_name($sid);
            array_push($re,$cname,$sname);
        }
     }

     return $re;

}


function get_city_name($Cid)
{
     
    $conn = conn_db();
    $re = "";
    
    // 预处理及绑定
    $stmt = $conn->prepare("select cname from City where cid=? ");
    $stmt->bind_param("i", $Cid);

    // 设置参数并执行
    $cid = $Cid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "cannnot fin city  ".$Cid;
         exit();
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($cname);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
          $re = $cname;
        }
     }

    return $re;

}


function get_Street_name($Sid)
{

       
    $conn = conn_db();
    $re = "";
    
    // 预处理及绑定
    $stmt = $conn->prepare("select sname from Street where sid=? ");
    $stmt->bind_param("i", $Sid);

    // 设置参数并执行
    $sid = $Sid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "cannnot fin city  ".$Sid;
         exit();
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($sname);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
          $re = $sname;
        }
     }

    return $re;

}

function get_user_name($Uid)
{
    $conn = conn_db();
    $re = "";
    
    // 预处理及绑定
    $stmt = $conn->prepare("select user_name from User where uid=? ");
    $stmt->bind_param("i", $uid);

    // 设置参数并执行
    $uid = $Uid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "cannnot find user name  ".$Uid;
         exit();
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($uname);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
          $re = $uname;
        }
     }

     return $re;

}


function get_block_id($Uid)
{

    
    $conn = conn_db();
    $re = "";
    
    // 预处理及绑定
    $stmt = $conn->prepare("select block_id from User where uid=? ");
    $stmt->bind_param("i", $uid);

    // 设置参数并执行
    $uid = $Uid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         //echo "cannnot find  your block, you should join block first！ ";
         return 0;
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($bid);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
          $re = $bid;
        }
     }

     return $re;


}

//输入uid  获取该用户的hood id
function get_hood_id($Uid)
{

    
    $conn = conn_db();
    $re = "";
    
    // 预处理及绑定
    $stmt = $conn->prepare("select hood_id from User where uid=? ");
    $stmt->bind_param("i", $uid);

    // 设置参数并执行
    $uid = $Uid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "cannnot find  your hood, you should join hood first！ ";
         return 0;
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($bid);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
          $re = $bid;
        }
     }

     return $re;


}

//返回 block id 和 block list的
function get_block_list()
{
       
    $conn = conn_db();
    $re = array();
    
    // 预处理及绑定
    $stmt = $conn->prepare("select bid,bname from Block ");
    //$stmt->bind_param("i", $Cid);

    // 设置参数并执行
    //$cid = $Cid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "cannnot fin block";
         return $re;
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($bid,$bname);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
          $re[$bid]= $bname;
        }
     }

    return $re;
  
}



function  get_street_mem($value)
{

    $conn = conn_db();
    $re = array();
    
    // 预处理及绑定
    $stmt = $conn->prepare("select uid,user_name from User where address_street_id = ? ");
    $stmt->bind_param("i", $sid);

    // 设置参数并执行
    $sid = $value;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "cannnot fin block";
         return $re;
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($uid,$uname);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
          $re[$uid] = $uname;
        }
     }

    return $re;

}


function get_hood_id_of_block($Bid)
{
    $conn = conn_db();
    $re = 0;
    
    // 预处理及绑定
    $stmt = $conn->prepare("select hid from Hood_and_Block where bid = ? ");
    $stmt->bind_param("i", $bid);

    // 设置参数并执行
    $bid = $Bid;
    $stmt->execute();
    $stmt->store_result();  //store result;

    if($stmt->num_rows==0)    // 取回全部查询结果
     {
         //chenck next type；
         echo "cannnot find hid";
         return $re;
     }else{
        //  查询结果绑定到变量中
        $stmt->bind_result($hid);
        while ($stmt->fetch())
        {
            // 逐条从MySQL服务取数据
         $re = $hid;
        }
     }

    return $re;

}



?>

