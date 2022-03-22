<?php
require('connexion.inc.php');

$sql = "SELECT * FROM livres";

$resultat = mysqli_query($cnx, $sql);
$livres = [];

while ($li = mysqli_fetch_array($resultat)){
    extract($li);
    //var_dump($li);
    $livres[$ref]= [
            'titre' => $titre,
            'auteur' => $auteur,
            'prix' => $prix,
            'editeur' => $editeur,
            'résumé' => $resume,
    ];   
    //var_dump($livres);
}
mysqli_close($cnx);

$msg = "<table border=1><tr><th>Titre</th><th>Fiche</th><tr>";

foreach ($livres as $ref=>$livre){
    extract($livre);
    $msg .= "<tr><td>$titre</td><td><a href='fichesql.php?ref=$ref'</a>Voir</td></tr>";
    //echo $msg;
}
$msg .="</table>";


?>
<DOCTYPE HTML>
    <html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title>BDPhila</title>
        <link href="style.css" rel="stylesheet" media="screen">
    </head>
        <body>
            <h1>BDPhila</h1>
            <?=$msg?>
        </body>
    </html>