<?php
session_start();
include( 'config/database.php' );
include_once "sidenav.php";
if ( strlen( $_SESSION[ 'userlogin' ] ) == 0 ) {
  header( 'location:auctions.php' );
} else {
  ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Auctions</title>
  <link rel="stylesheet" href="libs/bootstrap-3.3.6/css/bootstrap.min.css">

	<style>
		.m-r-1em{margin-right:1em;}
		.m-b-1em{margin-bottom:1em;}
		.m-l-1em{margin-left:1em;}
	
	</style>
</head>
	

<body style="margin-left: 2em;">
	<!-- Container--->
	<div class="container">
		<div class="page-header">
			<h1> Auctions </h1>
		</div>
		<?PHP
		
		include "config/database.php";
		
		
		// if it was redirected from delete.php
		$action=isset($_GET["action"]) ? $_GET["action"] : " ";
		if($action =="deleted")
		{
			echo"<div class='alert alert-success'>Record was deleted.</div>";
		}
		
		// select all data
		$query="SELECT a.auctionID,a.userID,a.itemID,a.quantity, a.value, u.username, i.name,i.price FROM auction a LEFT JOIN user u ON a.userID = u.userID LEFT JOIN item i ON a.itemID=i.itemID ORDER by auctionID DESC ";
		$stmt=$con->prepare($query);
		$stmt->execute();
		
		
		
		$num=$stmt->rowCount();
		
		echo'<a href="create.php" class="btn btn-primary m-b-1em">Create Auction</a>';
		
		if ($num>0)
		{
			//start table
			echo"<table class='table table-hover table-responsive table-bordered'";
			
			echo"<tr>";
			echo"<th>Item</th>";
			echo"<th>Quantity</th>";
			echo"<th>Price</th>";	
			echo"<th>Owner</th>";
			echo"<th>Action</th>";
      		echo"</tr>";
			
			
			
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				
				extract($row);
				$value = $price * $quantity;

				echo"<tr>";
        		echo"<td>{$name}</td>";
        		echo"<td>{$quantity}</td>";
        		echo"<td>{$value}g</td>";
				echo"<td>{$username}</td>";
				echo"<td>";
				//echo"<a href='read.php?id={$auctionID}' class='btn btn-primary m-r-1em'>Read</a>";
				echo"<a href='update.php?id={$auctionID}' class='btn btn-warning m-r-1em'>Edit</a>";
				echo"<a href='#' onclick='delete_user({$auctionID});'  class='btn btn-danger'>Delete</a>";
				echo"</td>";
      			echo"</tr>";
				
			}
			
			echo"</table>";
			
			
		}
		// if no records found
		else
		{
			
			echo"<div> No Auctions found.  </div> ";
		}
		
		
		?>
		
	
	</div>
	<!--End Container--->
	<script src="libs/jquery-3.0.0.min.js"></script>
	<script src="libs/bootstrap-3.3.6/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		
		function delete_user(id)
		{
			var answer = confirm("Are you sure?");
			if(answer)
			   {
			   	// if user clicked ok, 
				// pass the id to delete.php and execute the delete query 
				   
				   window.location = "delete.php?id="+id;
			   }
			
		}
	
	
	</script>
	
</body>
</html>
<?php }?>