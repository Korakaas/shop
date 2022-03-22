<?php
session_start();
$fichier = fopen('data/bdp.dat','r');
$texte = fgets($fichier);
$texte = fgets($fichier);

$uRef = $_GET['ref'];
$ref = 0;

while(!feof($fichier) AND $ref!==$uRef){
    $bd = explode('*',$texte);
    $ref=$bd[0];
    $texte = fgets($fichier);
    }
    $titre = ($bd[3]);
    $auteur = ($bd[1]);
    $editeur = ($bd[9]);

     if (!empty($bd[5])){
        $prix = trim($bd[5])."€";
    }
    else {
        $prix = 'pas de prix';
    }
    
    if (!empty($bd[12])){
        $resume = trim($bd[12]);
    }
    else {
        $resume = 'pas de résumé';
    }

$ref = strtolower($ref);
if (file_exists("img/$ref.jpg")){
    $img = "img/$ref.jpg";
}
else{
    $img = "img/defaut.jpg";
}
    
$msg = "<h2>$titre</h2><p>par $auteur</p><p>aux éditions $editeur</p><p>prix: $prix </p><img src='$img'><p>$resume</p>";

fclose($fichier);
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