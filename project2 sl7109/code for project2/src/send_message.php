

  
<?php

require_once("../dbs/neighbor_op.php");
require_once("../dbs/friend_op.php");

session_start();
$uid = $_SESSION["uid"];

$neighbor = get_all_neighbor($uid);
$neighbor_name = get_friend_name($neighbor);

$friend = get_all_friends($uid);  //获取所有好友id
$friend_name = get_friend_name($friend);


// var_dump($neighbor);
// var_dump($neighbor_name);

// var_dump($friend);
// var_dump($friend_name);

//将这两个表中的值进行合并
//并循环打印输出

$re =array();
foreach($neighbor as $key=>$value)
{
  //echo $value;
  $re[$value] = $neighbor_name[$key];
}

foreach($friend as $key=>$value)
{
  if(!array_key_exists($value, $re))
  {
    $re[$value] = $friend_name[$key];
  }
}
//var_dump($re);

?>



  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>siliang mini project</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">



			<form role="form"  method="post" action="send_message2.php">
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Message Title
					</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="title">
            </div>
            
				<div class="form-group">
					 <p>
					<label for="exampleInputPassword1">
						Message Body
					</label></p>
					
<textarea id="contact_list" name="contact_list" width ="200"></textarea>

				</div>
            <p>
					<label for="exampleInputPassword1">
						Who can visit it?
					</label></p>
            
 <select id="first" onChange="change()" name="first1">
   <option selected="selected">Hood</option>
   <option>Block</option>
   <option>Neighbors</option>
   <option>Friends</option>
   <option>Neighbor or Friend</option>
</select>
 
<select id="second" name="second2">
</select>

</b>
<!-- <input type="submit" name="submit" value="Send" id="submit"/>
<input type="reset" name="Submit2" value="reset">
</form> -->
 
				<div class="checkbox">
					 
					<label>
						<input type="checkbox" name="location"> add my location
					</label>
				</div> 
				<button type="submit" class="btn btn-primary">
					Submit
            </button>
            
			</form>
		</div>
	
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>


  
<script>
function change()
{
   var x = document.getElementById("first");
   var y = document.getElementById("second");
   y.options.length = 0; // 清除second下拉框的所有内容
   if(x.selectedIndex == 4)
   {

<?php
 foreach($re as $uid=>$uname)
 {
  echo "	y.options.add(new Option('".$uname;
  echo "', '".$uid;
  echo "'));";
 }

?>

	//	y.options.add(new Option("<?php echo "lily"; ?>", "0"));
	//	y.options.add(new Option("bob", "1", false, true));  // 默认选中省会城市
   }
 
}
</script>




</html>



