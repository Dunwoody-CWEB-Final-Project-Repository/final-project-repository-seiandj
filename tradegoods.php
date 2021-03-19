<?php
include_once "sidenav.php";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trade Goods
</title>
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
			<h1> Trade Goods</h1>
            <p>Create filter dropdown</p>
		</div>
		<?PHP
		
		include "config/database.php";
		
		
		$action=isset($_GET["action"]) ? $_GET["action"] : " ";
		if($action =="deleted")
		{
			echo"<div class='alert alert-success'>Record was deleted.</div>";
		}
		
		
		$query="SELECT itemID,name,price,profession FROM item ORDER by itemID DESC ";
		$stmt=$con->prepare($query);
		$stmt->execute();
		
		
		
		$num=$stmt->rowCount();
		
		
		
		if ($num>0)
		{
			//start table
			echo"<table class='table table-hover table-responsive table-bordered'";
			//  table heading
			echo"<tr>";
			echo"<th>Name</th>";	
			echo"<th>Price</th>";
			echo"<th>Profession</th>";
      		echo"</tr>";
			
			// retrieve  table contents
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				// extract row
				extract($row);
				
				echo"<tr>";
        		echo"<td>{$name}</td>";
        		echo"<td>{$price}g</td>";
        		echo"<td>{$profession}</td>";
      			echo"</tr>";
				
			}
			
			echo"</table>";
			
			
		}
		// if no records found
		else
		{
			echo"<table class='table table-hover table-responsive table-bordered'";
			//  table heading
			echo"<tr>";
			echo"<th>Name</th>";	
			echo"<th>Price</th>";
			echo"<th>Profession</th>";
      		echo"</tr>";
            echo"</table>";
			echo"<div> No records found.  </div> ";
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








