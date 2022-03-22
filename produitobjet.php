<?php
//afficher la fiche produit
$ref = $_GET['ref']??false;
if(!$ref){
//pas de ref fournie
//rediriger vers catalogue
header('location:cata_dao.php');
}



require('auto.php');
$ref = $_GET['ref'];



$dao = new Boutique\BdDAO;



$bd = $dao->getOneByRef($ref);



if(!strlen($bd->resume)){
$bd->resume = 'pas de résumé';
}
$image = "couv/$bd->ref.jpg";
if(!file_exists($image)){
$image='couv/defaut.jpg';
}
?>
<!DOCTYPE html>
<html>
<body>
<h1>Fiche</h1>
<h1><?=$bd->titre?></h1>
<h2>par <?=$bd->auteur?></h2>
<h3>aux éditions <?=$bd->editeur?></h3>
<h4><?=$bd->prix?> €</h4>

<div>
<img src='<?=$image?>' align='left'>
<?=$bd->resume?>
</div>

<form action = 'ajoute.php' method='post'>
Quantité : <input type='text' name='c_qte' value='1'>
<input type='hidden' name='c_ref' value="<?=$bd->ref?>">
<input type='hidden' name='c_tit' value="<?=$bd->titre?>">
<input type='hidden' name='c_prx' value="<?=$bd->prix?>">
<input type='submit' value='commander'>
</form>

</body>
</html>