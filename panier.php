<?php
session_start();
//var_dump($_SESSION['panier']);
$panier = $_SESSION['panier'];
if(!$panier){
    $msg='votre panier est vide';
}
else{
    $ftab = "<tr><td>%s</td><td>%0.2f</td><td>%d</td><td>%0.2f</td><td><a href='enleve copy.php?ref=%s'>X</a></td></tr>";
    $msg = '<table border=1>';
    foreach ($panier as $ref=>$bd){
        //echo $ref;
        $titre = $bd['titre'];
        $prix = (float) $bd['prix'];
        $qte = (int) $bd['qte'];
        $st = $prix*$qte;
        @$total += $st;
        $msg .= sprintf($ftab, $titre,$prix, $qte, $st, $ref);
        
    }
    $msg .="<tr><td  colspan=3>Total</td><td colspan=2>$total</td></tr></table>";
}

//var_dump($panier);
?>
<DOCTYPE HTML>
    <html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title>Panier</title>
        <link href="style.css" rel="stylesheet" media="screen">
    </head>
        <body>
            <h1>Panier</h1>
            <?=$msg?>
            <a href="cata.php">Catalogue</a>
        </body>
    </html>



