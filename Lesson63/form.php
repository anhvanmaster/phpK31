<?php 


 ?>
 <form action="cate-save.php" method="post">
 	<input type="text" name="id" value="<?= $models->id ?>" placeholder="">
 	<input type="text" name="name" value="<?= $models->name ?>" placeholder="">
 	<textarea name="description"><?= $models->description ?></textarea>
 	<button type="submit">gui di</button>
 </form>