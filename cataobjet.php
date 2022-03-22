<?php
require('auto.php');



$dao = new Boutique\BdDAO;



$liste = $dao->getAll();



foreach($liste->get() as $bd){
$lien = "<a href='fiche_dao.php?ref=$bd->ref'>voir</a>";
@$tr .= "<tr><td>$bd->titre</td><td>$lien</td></tr>\n";
}
?>
<!DOCTYPE html>
<html>
<body>
<h1>Catalogue DAO</h1>
<table border='1'>
<?=$tr?>