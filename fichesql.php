<?php
require('connexion.inc.php');
$ref = $_GET['ref'];
$sql = "SELECT * FROM livres WHERE ref = '$ref'";
$resultat = mysqli_query($cnx, $sql);
$bd = mysqli_fetch_array($resultat);
//var_dump($bd);
extract($bd);

file_exists("img/$ref.jpg")?$img = "img/$ref.jpg" : $img='img/defaut.jpg';
//echo $img;
$msg = "<h2>$titre</h2><p>par $auteur</p><p>aux éditions $editeur</p><p>prix: $prix </p><img src='$img'><p>$resume</p>";

?>
<DOCTYPE HTML>
    <html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title>Fiche</title>
        <link href="style.css" rel="stylesheet" media="screen">
    </head>
        <body>
            <h1>Fiche produit</h1>
            <?=$msg?>
            <form action="ajoute copy.php" method='POST'>
                <input type="hidden" name='ref' value='<?=$ref?>'>
                <input type="hidden" name='titre' value='<?=$titre?>'>
                <input type="hidden" name='prix' value='<?=$prix?>'>
                <input type='text' name='qte'>
            <input type='submit' value='OK'>
        </form>
        </body>
    </html>