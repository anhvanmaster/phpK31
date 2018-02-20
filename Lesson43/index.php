<?php
	// echo $_SERVER['REMOTE_ADDR'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	<form action="" method="post">
		<?php
			if (isset($_POST['register'])) {
				$ho = $_POST['ho'];
				$ten = $_POST['ten'];
				$user = $_POST['username'];
				$pass = $_POST['password'];
				$day = $_POST['day'];
				$month = $_POST['month'];
				$year = $_POST['year'];
				$sex = isset($_POST['sex'])? $_POST['sex'] : null;
				$err = true;
			}
		?>
		<input type="text" name="ho" placeholder="Họ">
		<?php
			if (isset($_POST['register'])) {
				if (strlen($ho) <=1) {
					echo "<div style='color:red'>Bạn chưa nhập đúng Họ</div>";
					$err = false;
				}
			}
		?>
		<input type="text" name="ten" placeholder="Tên"><br>
		<?php
			if (isset($_POST['register'])) {
				if (strlen($ten) <=1) {
					echo "<div style='color:red'>Bạn chưa nhập đúng Tên</div>";
					$err = false;
				}
			}
		?>
		<input type="text" name="username" placeholder="Số di động hoặc email">
		<?php
			if (isset($_POST['register'])) {
				if (strlen($user) <=9 || strlen($user) >21	) {
					echo "<div style='color:red'>Bạn chưa nhập đúng Số điện thoại hoặc email</div>";
					$err = false;
				}
			}
		?>
		<br>
		<input type="text" name="password" placeholder="Mật khẩu mới">
		<?php
			if (isset($_POST['register'])) {
				if (strlen($pass) <=8 || strlen($pass) >=20) {
					echo "<div style='color:red'>Mật khẩu có độ dài từ 8-20 kí tự</div>";
					$err = false;
				}
			}
		?>
		<p>Ngày sinh:</p>
		<select name="day">
			<?php
				for ($i = 1; $i < 32; $i++) {
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
		</select>
		<select name="month">
			<?php
				for ($i = 1; $i <= 12; $i++) {
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
		</select>
		<select name="year">
			<?php
				for ($i = 1900; $i < 2016; $i++) {
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
		</select>
		<?php
			if (isset($_POST['register'])) {
				if ($month == 2 && $day > 28) {
					if ($year % 4 == 0 && $year % 100 != 0) {
					} else {
						echo "<div style='color:red'>Bạn chọn ngày sai!</div>";
						$err = false;
					}
				}
			}
		?>
		<br>
		<input type="radio" name="sex" value="male" id="nu"><label for="nu">Nữ</label>
		<input type="radio" name="sex" value="female" id="nam"><label for="nam">Nam</label>
		<?php
			if (isset($_POST['register'])) {
				if ($sex == null) {
					echo "<div style='color:red'>Bạn chưa chọn giới tính</div>";
					$err = false;
				}
			}
		?>
		<br>
		<?php
			if (isset($_POST['register']) && $err) {
				echo "<div style='color:green'>Đăng kí thành công</div>";
			}
		?>
		<button type="submit" name="register">Tạo tài khoản</button>
	</form>
	<!-- <form action="" method="post">
		<div>
			<label for="username">User name:<br></label>
			<input type="text" name="username" id="username">
			<?php 
				if (isset($_POST['register'])) {
					$err = 0;
					$user = $_POST['username'];
					if ($user == '') {
						echo "<div style='color:red'>chưa nhập username</div>";
						$err++;
					}
					if (strlen($user)<=6 || strlen($user)>30) {
						echo "<div style='color:red'>username chỉ có độ dài từ 6-30 kí tự</div>";
					}
				}
			?>
		</div>
		<div>
			<label for="password">Password:<br></label>
			<input type="password" name="password" id="password">
			<?php 
				if (isset($_POST['register'])) {
					$pass = $_POST['password'];
					if ($pass == '') {
						echo "<div style='color:red'>chưa nhập password</div>";
						$err++;
					}
					if (strlen($pass)<=8 || strlen($pass)>20) {
						echo "<div style='color:red'>password chỉ có độ dài từ 8-20 kí tự</div>";
						$err++;
					}
				}
			?>
		</div>
		<?php
			if (isset($_POST['register']) && $err == 0) {
				echo "<div style='color:blue'>Đăng kí thành công!</div>";
			}
		?>
		<div>
			<button type="submit" name="register">Register</button>
		</div>
	</form> -->
</body>
</html>