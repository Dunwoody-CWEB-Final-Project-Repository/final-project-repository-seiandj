<?php
session_start();
include( 'config/database.php' );
include_once "sidenav.php";
if ( strlen( $_SESSION[ 'userlogin' ] ) == 0 ) {
  header( 'location:index.php' );
} else {
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
		// Code for fecthing user full name on the bassis of username or email.
			$username = $_SESSION[ 'userlogin' ];
			$query = $con->prepare( "SELECT username FROM user WHERE (username=:username || email=:username)" );
			$query->execute( array( ':username' => $username ) );
			while ( $row = $query->fetch( PDO::FETCH_ASSOC ) ) {
				$username = $row[ 'username' ];
			}
		?>
		<?php
		if($_POST){

			// include database connection
			include 'config/database.php';

			try{
				
				// insert query
				$query = "INSERT INTO auction SET owner=:owner, itemID=:itemID, quantity=:quantity";

				// prepare query for execution
				$stmt = $con->prepare($query);

				$owner=htmlspecialchars(strip_tags($_POST['owner']));
				$itemID=htmlspecialchars(strip_tags($_POST['itemID']));
				$quantity=htmlspecialchars(strip_tags($_POST['quantity']));
                //$value=htmlspecialchars(strip_tags($_POST['value']));

				// bind the parameters
				$stmt->bindParam(':owner', $owner);
				$stmt->bindParam(':itemID', $itemID);
				$stmt->bindParam(':quantity', $quantity);
                
				
				//CHECK FOR EMPTY FIELDS
				if( empty($_POST['itemID']) || empty($_POST['quantity'])){
					echo "Choose Item and Quantity";
				}
				else{
					// Execute the query
					if($stmt->execute()){
						echo "<div class='alert alert-success'>Record was saved.</div>";
					}else{
					echo "<div class='alert alert-danger'>Unable to save record.</div>";
					}
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
					<td>Owner</td>
					<td><?php echo htmlspecialchars($username); ?></td>
					<td><input type='hidden' name='owner' class='form-control' value=<?php echo htmlspecialchars($username); ?> /></td>
				</tr>
				<tr>
					<td>Item</td>
                    <td>
					<?php
			        include "config/database.php";
			        $queryItems = "SELECT itemID, name, price FROM item";
			        $stmtItems= $con->prepare($queryItems);
			        $stmtItems->execute();
			
			        echo "<select class='form-control' name='itemID'>";
			        echo "<option>Choose Item </option>";
			        while ($row_item = $stmtItems->fetch(PDO::FETCH_ASSOC)){
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
<?php }?>