<?php

require_once("../dbs/profile_db.php");
 session_start();
 $uid= $_SESSION['uid'];
 $uname = $_SESSION['name'];


$re = search_profile_db($uid);
//将re的结果显示在下面的网页中
$img = "https://www.layoutit.com/img/sports-q-c-140-140-3.jpg";
if($re[0] == "***"){}else{
	$img = "photo/".$re[0];
}

$self = $re[1];
$family = $re[2];

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
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<img alt="Bootstrap Image Preview" src="<?php echo $img; ?>"  width= 60  height = 60 class="rounded-circle" style="margin: 0 auto;" >
			<p>
				<?php  echo $uname; ?>
		</p>
		</div>
		<div class="col-md-8">
			<div class="btn-group" role="group">
				 <a href = "edit_profile.html">
				<button class="btn btn-secondary" type="button">
					Edit Profile
				</button> 
                </a>
				<button class="btn btn-secondary" type="button">
					Friend 
				</button> 
				<button class="btn btn-secondary" type="button">
					Neighbor
				</button> 
			</div>
			
			
			<p>
			
			Self Intro:
			<p> <?php  echo $self; ?> </p>

			</p>
			
			
			<p>
			Family Intro:
			<p><?php  echo $family; ?></p>
				
				</p>

		</div>
		<div class="col-md-2">
			 
			<button type="button" class="btn btn-success">
				Button
			</button>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>