<?php
session_start();
$uref= $_GET['ref'];
//echo $uref;
//var_dump($_SESSION['panier']);

foreach ($_SESSION['panier'] as $ref=>$bd){
    if($ref === $uref){
        if($bd['qte'] !=1){
            $bd['qte'] -=1;
            echo 'réussi';
            $_SESSION['panier'][$ref]['qte']= $bd['qte'];
        }
        else{
            unset($_SESSION['panier'][$ref]);
        }
        
    }
    else{
        echo 'raté';
    }
}
header('Location:panier.php');