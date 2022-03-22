<?php
$sNom = 'Braive';
$Prenom = 'Xavier';
$sRue = 'Archambauds';
$iNo = 23;
$iCP = 17600;
$sVille = 'St Georges';
$fTotalHT = 600.00; 
?>

<DOCTYPE Html>
<body>
    <table border=1>
        <tr><td>Client</td><td><?=$sNom?></td></tr
        ><tr><td>Adresse</td><td><?="$iNo, rue $sRue<br> $iCP - $sVille"?></td></tr>
        <tr><td>Montant de la commande HT</td><td><?="$fTotalHT €"?></td></tr>
    </table>
<body>

