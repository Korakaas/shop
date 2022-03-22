<?php

$fichier = fopen('data/bdp.dat','r');
$texte = fgets($fichier);
$texte = fgets($fichier);
$listBd = [];
while (!feof($fichier)){
    
    $bd = explode('*',$texte);
    $ref = $bd[0];
    $titre = @$bd[3]; 
    $listBd[$ref] = $titre;
    $texte = fgets($fichier);
}
fclose($fichier);

//var_dump($listBd);

$ftab = "<tr><td>%s</td><td><a href='fiche.php?ref=%s'>voir</a></td></tr>";

foreach ($listBd as $ref=>$titre){
    
    $bd = sprintf($ftab,$titre,$ref);
    //var_dump($bd);
    @$tab .=$bd;
    
}

$msg ="<table border=1>";
$msg .=$tab;
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