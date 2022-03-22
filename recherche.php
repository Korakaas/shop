<?php
require('connexion.inc.php');
$sql = "SELECT auteur, editeur FROM livres";
$resultat = mysqli_query($cnx, $sql);
$fopt = "<option>%s</option>";
$liauteurs = "<option>Sélectionnez</option>";
$liediteurs = "<option>Sélectionnez</option>";
while ($liste=mysqli_fetch_array($resultat)){
    extract($liste);
    if($auteur){
        @$auteurs[] .= sprintf($fopt,$auteur);
    }
    @$editeurs[] .= sprintf($fopt,$editeur); 
}
$editeurs = array_unique($editeurs);
asort($editeurs);
$auteurs = array_unique($auteurs);
asort($auteurs);
//var_dump($auteurs);

foreach ($editeurs as $editeur){
    $liediteurs .= $editeur;
}
foreach ($auteurs as $auteur){
    $liauteurs .= $auteur;
}

$sql ="SELECT * From livres ";
$_POST['auteur'] === 'Sélectionnez'? $f_auteur = '' : $f_auteur = $_POST['auteur'] ;
$_POST['editeur'] === 'Sélectionnez'? $f_editeur = '' : $f_editeur = $_POST['editeur'] ;
$f_resume = $_POST['resume'];
$f_prixinf = (int) $_POST['prixinf'];
$f_prixsup = (int) $_POST['prixsup'];

$f_auteur ? $sqla = " auteur LIKE '$f_auteur'" : $sqla = '' ;
$f_editeur ? $sqle = " editeur LIKE '$f_editeur'" : $sqle = '' ;
$f_resume ? $sqlr = " resume LIKE '%$f_resume%'" : $sqlr = '' ;
$f_prixinf ? $sqlpi = " prix < $f_prixinf" : $sqlpi = '' ;
$f_prixsup ? $sqlps = " prix > $f_prixsup" : $sqlps = '' ;

$filtre = [
    'auteur' => $sqla ,
    'editeur' => $sqle,
    'resume' => $sqlr,
    'prixinf' => $sqlpi,
    'prixsup' => $sqlps,
];

var_dump($filtre);
foreach ($filtre as $requete){
    if($requete){
        $requête .=$requete . ' AND ';
    }
    
}
echo $requête;
?>

<DOCTYPE HTML>
    <html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title>Recherche</title>
        <link href="style.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <h1>Recherche</h1>
        <form action="#.php" method="post">
            <label for="auteur">Sélectionnez un auteur</label>
            <select name="auteur">
                <?= $liauteurs ?>
            </select><br>
            <label for="editeur">Sélectionnez un éditeur</label>
            <select name="editeur">
                <?= $liediteurs ?>
            </select><br>
            <label for="resume">Rechercher dans le résumé</label>
            <input name ="resume" type="text"><br>
            <label for="prixinf">Prix inférieur à </label>
            <input name ="prixinf" type="text">
            <div>
            <input type="radio" name="et" value="et">
            <label for="et">ET</label>
            </div>
            <div>
            <input type="radio" name="ou" value="ou">
            <label for="ou">OU</label>
            </div>
            <label for="prixsup">Prix supérieur à </label>
            <input name ="prixsup" type="text"><br>
            <input type="submit" value='OK'>
        </form>
    
<body>