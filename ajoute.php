<?php
session_start();
//phpinfo();
extract($_POST);
$panier = $_SESSION['panier'];   

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
    //var_dump($bd); 
    //var_dump($_SESSION['panier']); 
    //var_dump($panier);
    if(array_key_exists($ref, $panier)){
        //var_dump($panier); 
        $panier[$ref]['qte'] += $qte;
        $_SESSION['panier']= $panier;
        $panier = $_SESSION['panier'];
        //var_dump($panier);  
    }
    else{
        //var_dump($panier);  
         $bd2 = [
            'titre' => $titre,
            'prix' => $prix,
            'qte' => $qte,           
        ];
        $panier += [$ref => $bd2];
        $_SESSION['panier']= $panier;
        $panier = $_SESSION['panier']; 
        //var_dump($panier);  
    }
    
}
header('Location:panier.php');
//var_dump($panier); 
//var_dump($_SESSION); 