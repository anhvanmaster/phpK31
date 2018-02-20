<form action="" method="get">
	<div>
		<label for="soA">a=</label>
		<input type="text" name="soA" id="soA" value="<?php if (isset($_GET['post_data'])) echo $_GET['soA']; ?>">
	</div>
	<div>
		<label for="soB">b=</label>
		<input type="text" name="soB" id="soB" value="<?php if (isset($_GET['post_data'])) echo $_GET['soB']; ?>">
	</div>
	<div>
		<label for="soC">c=</label>
		<input type="text" name="soC" id="soC" value="<?php if (isset($_GET['post_data'])) echo $_GET['soC']; ?>">
	</div>
	<button type="submit" name="post_data">Tính</button>
</form>
<?php
	if (isset($_GET['post_data'])) {
		if (isset($_GET['soA']) && isset($_GET['soB']) && isset($_GET['soC'])) {
			$a = $_GET['soA']; $b = $_GET['soB']; $c = $_GET['soC']; $b2=$b/2;
			$x = array(
			        1 => 0,
                    2 => 0
            );
            $delta = $b2 - $a*$c;
            if ($delta<0){
                echo 'Phương trình vô nghiệm';
            } elseif ($delta==0){
                $x[1] = $x[2] = -($b2)/$c;
                echo 'phương trình có nghiệm kép là:'.$x[1];
            } elseif ($delta>0){
                $x[1]=(-$b2+sqrt($delta))/$a;
                $x[2]=(-$b2-sqrt($delta))/$a;
                echo "phương trình có 2 nghiệm phân biệt là x1=$x[1], xx2=$x[2]";
            }
		} else {
			echo '<p style="color: red;">chưa nhập đủ dữ liệu</p>';
		}
	}
?>