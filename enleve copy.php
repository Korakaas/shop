<?php
session_start();
$ref= $_GET['ref'];

if($_SESSION['panier'][$ref]['qte'] !=1){
    $_SESSION['panier'][$ref]['qte'] -=1;
}
else{
    unset($_SESSION['panier'][$ref]);
}

header('Location:panier.php');