<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['ProductID'])) {
        $id = $_REQUEST['ProductID'];
    }

    if ( !empty($_POST)) {
        // keep track post values
        $ProductID = $_POST['ProductID'];
        $ProductName = $_POST['ProductName'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        // Updating data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE info SET ProductName = ?, Brand = ?, Price = ?, Quantity = ? WHERE ProductID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($ProductName,$brand,$price,$quantity,$ProductID));
        Database::disconnect();
        header("Location: databarang.php");
    }
     
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM info where ProductID = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<h1>Edit Product Data</h1>
		<form class="form-horizontal" action="user data edit page.php" method="post" style="margin:auto;width:50%;padding:10px;border-radius:10px;border:5px solid;">
			<div class="form-floating mb-3">
				<input type="text" name="ProductID" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $data['ProductID'];?>" readonly>
				<label for="floatingInput">Product ID</label>
			</div>
			
			<div class="form-floating mb-3">
				<input type="text" name="ProductName" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $data['ProductName'];?>" required>
				<label for="floatingInput">Product name</label>
			</div>
			
			<div class="form-floating mb-3">
				<input type="text" name="brand" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $data['brand'];?>" required>
				<label for="floatingInput">Brand</label>
			</div>
			
			<div class="form-floating mb-3">
				<input type="number" name="price" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $data['price'];?>" required>
				<label for="floatingInput">Price</label>
			</div>

			<div class="form-floating mb-3">
				<input type="number" name="quantity" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $data['quantity'];?>" required>
				<label for="floatingInput">Quantity</label>
			</div>
			
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Update</button>
				<a class="btn" href="databarang.php">Back</a>
			</div>
		</form>
	</body>
</html>