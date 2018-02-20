<?php

if (!empty($_GET['id'])) {
	

$id = $_GET['id'];
try {
	$con = new PDO("mysql:host=localhost;dbname=homework;charset=utf8","root","");
} catch (PDOException $e) {
	echo "Lỗi kết nối CSDL".$e->getMessage();
}
$sql = "SELECT * FROM products WHERE ProductID=?";
$cmd= $con->prepare($sql);
$cmd->execute(array($id));
$product = $cmd->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['save'])) {
	$ProductName = $_POST['ProductName'];
	$SupplierID = $_POST['SupplierID'];
	$CategoryID = $_POST['CategoryID'];
	$QuantityPerUnit = $_POST['QuantityPerUnit'];
	$UnitPrice = $_POST['UnitPrice'];
	$UnitsInStock = $_POST['UnitsInStock'];
	$UnitsOnOrder = $_POST['UnitsOnOrder'];
	$ReorderLevel = $_POST['ReorderLevel'];
	// var_dump($_POST['Discontinued']); die;
	$Discontinued = isset($_POST['Discontinued']) == true ? 1 : "";
	$ins = "UPDATE products
			SET
				ProductName=		?,
				SupplierID=			?,
				CategoryID=			?,

				QuantityPerUnit=	?,
				UnitPrice=			?,
				UnitsInStock=		?,

				UnitsOnOrder=		?,
				ReorderLevel=		?,
				Discontinued=		?

			WHERE ProductID=?";
	$options = array(
						$ProductName,
						$SupplierID,
						$CategoryID,

						$QuantityPerUnit,
						$UnitPrice,
						$UnitsInStock,

						$UnitsOnOrder,
						$ReorderLevel,
						$Discontinued,

						$id
				);

	$stmt = $con->prepare($ins);
	$result = $stmt->execute($options);
	if ($result) {
		header("location:index.php");
	}else
		header("location:".$_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	
		<form action="" method="POST" role="form">
			<legend>Form title</legend>
			<? var_dump($product) ?>
			<?php foreach ($product as $key => $value) : ?>
			
			<?php if ($key == "ProductID") continue; ?>
			<?php if ($key == "Discontinued") : ?>
				<div>
					<label for=""><?= $key ?></label>
					<input type="checkbox" name="<?= $key ?>" <?= $value == 1? "checked" : "" ?> >
				</div>
				<?php continue ?>
			<?php endif; ?>
			<div class="form-group">
				<label for=""><?= $key ?></label>
				<input type="text" value="<?= $value ?>" name="<?= $key ?>" class="form-control" id="" placeholder="Input field">
			</div>
			<?php endforeach; ?>
		
			
		
			<button type="submit" name="save" class="btn btn-primary">Submit</button>
		</form>
		
	
	<script src="public/js/jquery-3.2.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>