
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
	<div class="row"  style="background-color:rgb(171, 197, 199);">
		<div class="col-md-12">
			<div class="row"  style="background-color:rgb(105, 141, 123);">
				<div class="col-md-10">
					<ul class="nav nav-pills">
						<li class="nav-item">
							 <a class="nav-link btn btn-primary" href="main.php">Home <span class="badge badge-light">42</span></a>
						</li>
						<li class="nav-item">
							 <a class="nav-link" href="#"><?php session_start();    echo "welcome login ".$_SESSION["name"];  ?></a>
						</li>

						<li class="nav-item">

						<form class="form-inline" action="search_mess.php" method="post" >
						<input class="form-control mr-sm-2" type="text" name = "search"  placeholder="search for message"> 
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							Search
						</button></form>
	   
						</li>

					</ul>
					


				</div>
				<div class="col-md-2">
					<div class="dropdown">
						 
						<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
							Profile
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							 <a class="dropdown-item disabled" href="#">action</a> 
							 <a class="dropdown-item" href="edit_profile.html">edit profile</a>
							  <a class="dropdown-item" href="view_profile.php">view profile</a>
							  <a class="dropdown-item" href="friend_list.php">friend list</a>
							  <a class="dropdown-item" href="neighbor_list.php">neighbor list</a>
							  <a class="dropdown-item" href="logout.php"> Log Out</a>
						</div>
					</div>
				</div>
			</div>
			<div id="card-368984">
				<div class="card">
					<div class="card-header">
						 <a class="card-link collapsed" data-toggle="collapse" data-parent="#card-368984" href="#card-element-695061">Message</a>
                    </div>
                    
					<div id="card-element-695061" class="collapse">
						<div class="card-body">
							<a href = "send_message.php">send message</a>
                        </div>
                        <div class="card-body">
						<a href="view_friend_mess.php">
							view  friend message
							</a>
						</div>

                        <div class="card-body">
						<a href="view_neighbor_mess.php">
							view  neighbor message
							</a>
                        </div>
                        <div class="card-body">
						<a href="view_block_mess.php">
							view  block message
						</a>
                        </div>
                        <div class="card-body">
						<a href="view_hood_mess.php">
							view  hood message
						</a>
						</div>
                    </div>


                    
				</div>

				<div class="card">
					<div class="card-header">
						 <a class="card-link collapsed" data-toggle="collapse" data-parent="#card-368984" href="#card-element-235883">Block</a>
                    </div>
                    
					<div id="card-element-235883" class="collapse">
					<a href ="join_block.php">
					<div class="card-body">
							join block
						</div>
					</a>
					
						<a href ="leave_block.php">
                        <div class="card-body">
							leave block
						</div>
						</a>

						<a href = "view_block_request.php"
                        <div class="card-body">
							view Block Request
						</div>


                    </div>
      
				</div>
				<div class="card">
					<div class="card-header">
						 <a class="card-link collapsed" data-toggle="collapse" data-parent="#card-368984" href="#card-element-235884">Friend</a>
                    </div>
                    
					<div id="card-element-235884" class="collapse">
						<a href="friend_list.php">
						<div class="card-body">
							Friend List
						</div></a>

						<a href="add_friend.php">
                        <div class="card-body">
							Add Friend
						</div>
						</a>

						<a href="view_friend_request.php">
						<div class="card-body">
							view Friend Request
						</div>
						</a>

						

                    </div>
      
				</div>
				
				<div class="card">
					<div class="card-header">
						 <a class="card-link collapsed" data-toggle="collapse" data-parent="#card-368984" href="#card-element-235885">Neighbor</a>
                    </div>
                    
					<div id="card-element-235885" class="collapse">
						<a href="neighbor_list.php">
							<div class="card-body">
							Neighbor List
						</div></a>
						<a href = "add_neighbor.php">
                        <div class="card-body">
							Add Neighbor
						</div>
						</a>
					</div>
					

				</div>
				
				

				<div class="card">
					<div class="card-header">
						 <a class="card-link collapsed" data-toggle="collapse" data-parent="#card-36898" href="#card-element-235888">Map View</a>
                    </div>
                    
					<div id="card-element-235888" class="collapse">
						<a href="map_view.php">
							<div class="card-body">
							View Block Member Map
						</div></a>
					
					</div>
					

				</div>
				



			</div>
			<div class="carousel slide" id="carousel-735305">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-735305">
					</li>
					<li data-slide-to="1" data-target="#carousel-735305" class="active">
					</li>
					<li data-slide-to="2" data-target="#carousel-735305">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap First" src="photo/xiamu1.jpg">
						<div class="carousel-caption">
							<h4>
						    	siliang mini project 
							</h4>
							<p>
								First Page
							</p>
						</div>
					</div>
					<div class="carousel-item active">
						<img class="d-block w-100" alt="Carousel Bootstrap Second" src="photo/xiamu2.jpg">
						<div class="carousel-caption">
							<h4>
							    siliang mini project 
							</h4>
							<p>
								Second Page
							</p>
						</div>
					</div>
					<div class="carousel-item" >
						<img class="d-block w-100" alt="Carousel Bootstrap Third" src="photo/xiamu3.jpg"  style="text-align:center">
						<div class="carousel-caption">
							<h4>
							siliang mini project 
							<p>
								Third Page
							</p>
						</div>
					</div>
				</div> <a class="carousel-control-prev" href="#carousel-735305" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-735305" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
			</div>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>