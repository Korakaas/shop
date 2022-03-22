<?php

$fichier = fopen('data/bdp.dat','r');

$liste = "<select><option>Selectionnez</option>";
$auteurs = [];
$texte = fgets($fichier);
while (!feof($fichier)){
    $texte = fgets($fichier);
    $bd = explode("*", $texte);
    $aut = @$bd[1];
    if (!in_array($aut, $auteurs)){
        if(!empty($aut)){
            $auteurs[] = trim($aut);          
        }        
    }      
}
fclose($fichier);
function option($l)
{
    $foption = "<option>%s</option>";
    return sprintf($foption, $l);
}
sort($auteurs);

$auteurs = array_map('option', $auteurs);
//var_dump($auteurs);
foreach ($auteurs as $auteur){
    $liste .= $auteur;  
}
$liste .="</select>";

$fichier = fopen('auteur.sel.php','w');
fputs($fichier, $liste);
fclose($fichier);

header("Location:auteur.sel.php");