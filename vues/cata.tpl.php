<!DOCTYPE html>
<html>
<body>
<h1>Catalogue DAO</h1>
<table border='1'>
	<?php
	foreach ($liste as $bd){
		include('lignes.tpl.php');
	}
	?>
</table>
</body>
</html>