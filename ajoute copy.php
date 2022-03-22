<?php
session_start();
//phpinfo();
extract($_POST);
$panier = &$_SESSION['panier'];   
var_dump($ref);
var_dump($panier);
if(!$panier){
    
    $bd[$ref]= [
        'titre' => $titre,
        'prix' => $prix,
        'qte' => $qte,           
    ];
    $_SESSION['panier']= $bd;
    $panier = $_SESSION['panier'];  
    //var_dump($panier);
     
}
else{
    if(array_key_exists($ref, $panier)){
        $panier[$ref]['qte'] += $qte;
    }
    else{
        $bd[$ref]= [
            'titre' => $titre,
            'prix' => $prix,
            'qte' => $qte,           
        ];
        $panier += $bd; 
    }
    
}
    
header('Location:panier.php');
