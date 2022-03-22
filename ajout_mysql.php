<?php
require('connexion.inc.php');
$sql = "DELETE FROM livres";
$resultat = mysqli_query($cnx, $sql);

$fichier = fopen('data/bdp.dat', 'r');
$texte = fgets($fichier);
$texte = fgets($fichier);

while (!feof($fichier)){
    $bd = explode('*', $texte);
    $ref = $bd[0]; 
    if($bd[5]){
        $prix = addslashes(trim($bd[5]));
    }
    else{
        $prix = 0;
    }
    if(@$bd[12]){
        $resume = addslashes(trim(@$bd[12]));
    }
    else{
        $resume = "pas de résumé";
    }
    $livres[$ref] = [
        'titre' => addslashes(trim($bd[3])),
        'auteur' => addslashes(trim($bd[1])),
        'prix' => $prix,
        'editeur' => addslashes(trim($bd[9])),
        'resume' => $resume
    ];
    $texte = fgets($fichier);
}
fclose($fichier);

foreach ($livres as $ref=>$livre){
    
    extract($livre);
    //var_dump($livre);
    echo $ref;
    $sql = "INSERT INTO livres (ref, titre, auteur, prix, editeur, resume) VALUES ('$ref', '$titre', '$auteur', '$prix', '$editeur', '$resume')";
    $resultat = mysqli_query($cnx, $sql);
    if(!$resultat){
        echo "échec du transfert: " . mysqli_error($cnx);
  exit();
    }
    else{
        echo "transfert réussi";
    }
}
mysql_close($cnx);