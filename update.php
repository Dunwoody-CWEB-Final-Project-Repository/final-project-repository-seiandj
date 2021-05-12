<?php 
include_once "sidenav.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit an Auction</title>
<link rel="stylesheet" href="libs/bootstrap-3.3.6/css/bootstrap.min.css" />
</head>

<body>
<!-----Container----->
<div class="container">
  <div class="page-header">
    <h1>Edit Auction</h1>
  </div>
  <?php
	// include database connection
	include "config/database.php";
	//get passed parameter value via record id
	$id=isset($_GET["id"]) ? $_GET["id"]:die("ERROR: Record ID not found.");
	//check if form was submitted
	if($_POST){
		try{
			//write update query
			$query="UPDATE auction SET quantity=:quantity WHERE auctionID=:auctionID";
			
			// prepare query for execution
			$stmt = $con->prepare($query);

			
			$quantity=htmlspecialchars(strip_tags($_POST['quantity']));
			$id=htmlspecialchars(strip_tags($id));

			// bind the parameters
			
			$stmt->bindParam(':quantity', $quantity);
			$stmt->bindParam(':auctionID', $id);
			//execute query
			if($stmt->execute()){
				echo "<div class='alert alert-success'>Record was saved.</div>";
			}
			else{
				echo "<div class='alert alert-danger'>Unable to save record.</div>";
			}
		}
		// show error
		catch(PDOException $exception){
			die('ERROR: ' . $exception->getMessage());
		}
	}
	//read current record data
	try{
		//prepare select query
		$query="SELECT a.auctionID, a.owner, a.itemID, a.quantity, i.name FROM auction a  LEFT JOIN item i ON a.itemID=i.itemID  WHERE auctionID= ? LIMIT 0,1";
		$stmt=$con->prepare($query);
		//first question mark
		$stmt->bindParam(1,$id);
		//execute querry
		$stmt->execute();
		//store retrieved to a variable
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		//values to fill our form
		$itemID=$row["itemID"];
		$quantity=$row["quantity"];
        $owner=$row["owner"];
        $itemName=$row["name"];
		
	}
	// show error
	catch(PDOException $exception){
		die('ERROR: ' . $exception->getMessage());
	}
	
  ?>
	
	
  <!-- html form here where the product information will be entered -->
  <form action="update.php?id=<?php echo htmlspecialchars($id);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
      <tr>
        <td>Owner</td>
        <td><?php echo htmlspecialchars($owner); ?></td>
      </tr>
      <tr>
        <td>Item</td>
        <td><?php echo htmlspecialchars($itemName); ?></td>
      </tr>
      <tr>
        <td>Quantity</td>
        <td><input type='text' name='quantity' class="form-control" value="<?php echo htmlspecialchars($quantity); ?>" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type='submit' value='Save Changes' class='btn btn-primary' />
          <a href='auctions.php' class='btn btn-danger'>Back to Auctions</a></td>
      </tr>
    </table>
  </form>
</div>
<!---Container End--->
<script src="libs/jquery-3.0.0.min.js"></script>
<script src="libs/bootstrap-3.3.6/js/bootstrap.min.js"></script>
</body>
</html>