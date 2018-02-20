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
	<form action="save_create.php" method="POST" role="form">
	
		<div class="form-group">
			<label for="">ProductName</label>
			<input type="text" name="ProductName" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">SupplierID</label>
			<input type="number" name="SupplierID" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">CategoryID</label>
			<input type="number" name="CategoryID" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">QuantityPerUnit</label>
			<input type="text" name="QuantityPerUnit" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">UnitPrice</label>
			<input type="text" name="UnitPrice" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">UnitsInStock</label>
			<input type="text" name="UnitsInStock" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">UnitsOnOrder</label>
			<input type="text" name="UnitsOnOrder" class="form-control" id="" placeholder="Input field">
		</div>
		<div>
			<label for="">Discontinued
			<input type="checkbox" name="Discontinued"></label>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">them</button>
	</form>




	<script src="public/js/jquery-3.2.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
</body>
</html>