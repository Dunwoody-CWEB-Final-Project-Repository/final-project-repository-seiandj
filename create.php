<?php
include_once "sidenav.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Create Auction</title>

	<link rel="stylesheet" href="libs/bootstrap-3.3.6/css/bootstrap.min.css" />



</head>
<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Create an Auction</h1>
        </div>

		<?php
		if($_POST){

			// include database connection
			include 'config/database.php';

			try{

				// insert query
				$query = "INSERT INTO auction SET userID=:userID, itemID=:itemID, quantity=:quantity";

				// prepare query for execution
				$stmt = $con->prepare($query);

				$userID=htmlspecialchars(strip_tags($_POST['userID']));
				$itemID=htmlspecialchars(strip_tags($_POST['itemID']));
				$quantity=htmlspecialchars(strip_tags($_POST['quantity']));
                //$value=htmlspecialchars(strip_tags($_POST['value']));

				// bind the parameters
				$stmt->bindParam(':userID', $userID);
				$stmt->bindParam(':itemID', $itemID);
				$stmt->bindParam(':quantity', $quantity);
                //$stmt->bindParam(':value', $value);
				

				// Execute the query
				if($stmt->execute()){
					echo "<div class='alert alert-success'>Record was saved.</div>";
				}else{
					echo "<div class='alert alert-danger'>Unable to save record.</div>";
				}

			}

			// show error
			catch(PDOException $exception){
				die('ERROR: ' . $exception->getMessage());
			}

		}
		?>
        
		<!-- html form here where the product information will be entered -->
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<table class='table table-hover table-responsive table-bordered'>
				<tr>
                    <!--Default to userID=1 until I can implement login and get the currently logged in user-->
					<td>Owner</td>
					<td><input type='text' name='userID' class='form-control' value=1 /></td>
				</tr>
				<tr>
					<td>Item</td>
                    <td>
					<?php
			        include "config/database.php";
			        $queryProf = "SELECT itemID, name, price FROM item";
			        $stmtProf= $con->prepare($queryProf);
			        $stmtProf->execute();
			
			        echo "<select class='form-control' name='itemID'>";
			        echo "<option>Choose Item </option>";
			        while ($row_item = $stmtProf->fetch(PDO::FETCH_ASSOC)){
				        extract($row_item);
				        echo "<option value='{$itemID}'>{$name} (ea {$price}g)</option>";
			        }
			        echo "</select>";
			        ?>
                    </td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td><input type='text' name='quantity' class='form-control' /></td>
				</tr>
                <tr>
					<!--<td>TotalPrice</td>
					<td><input type='text' name='value' class='form-control' /></td>-->
				</tr>
				<tr>
					<td></td>
					<td>
						<input type='submit' value='Create' class='btn btn-primary' />
						<a href='auctions.php' class='btn btn-danger'>Back to Auctions</a>
					</td>
				</tr>
			</table>
		</form>

	</div> <!-- end .container -->


<script src="libs/jquery-3.0.0.min.js"></script>


<script src="libs/bootstrap-3.3.6/js/bootstrap.min.js"></script>

</body>
</html>
