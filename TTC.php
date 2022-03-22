<?php

$ht = $_GET['ht'];
$taux = $_GET['tva'];

function TTC($ht, $taux){
    $TVA = [0.05, 0.196];
    $tva = $TVA[$taux];
    $ttc = $ht+$ht*$tva;
    $rs = [$ttc, $tva];
    return $rs;
}

$rs = TTC($ht, $taux);
foreach ($rs as $valeur){
    echo "$valeur<br>";
}