<?php
require('f_compta.lib.php');
$livres = [
    'BD000001' =>[
        'titre' => 'Tintin',
        'auteur' => 'Hergé',
        'editeur' => 'Casterman',
        'prix' => 10.5,
        'stock' => 5,
    ],
    'BD000002' =>[
        'titre' => 'Asterix',
        'auteur' => 'Uderzo',
        'editeur' => 'Goscinny',
        'prix' => 9,
        'stock' => 10,
    ]
];

$i18n = [
    'fr' => [
        'ltitre' => 'Titre',
        'lauteur' => 'Auteur',
        'lediteur' => 'Editeur',
        'lprix' => 'Prix',
        'lstock' => 'Stock',
        'lTVA' => 'TVA',
        'lTTC' =>  'TTC',
        'CGV' => 'Vous n\'avez pas accepté les CGV',
        'PU' => 'PU',
        'Soustotal' => 'Sous Total',
        'Total' =>'Total',

    ],
    'en' => [
        'ltitre' => 'Title',
        'lauteur' => 'Author',
        'lediteur' => 'Publisher',
        'lprix' => 'Price',
        'lstock' => 'Stock',
        'lTVA' => 'VAT',
        'lTTC' =>  'ATI',
        'CGV' => 'You did not accept the Terms and Conditions ',
        'PU' => 'UP',
        'Soustotal' => 'Subtotal',
        'Total' =>'Total'

    ]
];

var_dump($livres);
$lang=$i18n[$_POST['lang']];
$color = $_POST['color'];
$TVA = TVA;






if (!@$_POST['CGV']){
    $msg = $lang['CGV'];
}
else{
    if ($_POST['ref'] ==='inventaire'){
        $Total = 0;
        $msg = "<table class='$color' border=1>
        <tr>
            <td>{$lang['ltitre']}</td><td>{$lang['lstock']}</td><td>{$lang['PU']}</td><td>{$lang['Soustotal']}</td>
        </tr>";
        foreach ($livres as $ref => $livre){
            $ST = $livre['prix']*$livre['stock'];
            $msg .="<tr>
                        <td>{$livre['titre']}</td><td>{$livre['stock']}</td><td>{$livre['prix']}</td><td>$ST</td>
                    </tr>";
            $Total += $ST;
        }
        $msg .="<tr>
                    <td colspan='3'>{$lang['Total']}</td><td>$Total<td></td>
                 </tr>
                 </table>";
    }
    else{
        $ref = $livres[$_POST['ref']];
        $TTC = TTC($ref['prix']);
        $msg = "<table class='$color' border=1>
        <tr>
            <td>{$lang['ltitre']}</td><td>{$ref['titre']}</td>
        </tr>
        <tr>
            <td>{$lang['lauteur']}</td><td>{$ref['auteur']}</td>
        </tr>
        <tr>
            <td>{$lang['lediteur']}</td><td>{$ref['editeur']}</td>
        </tr>
        <tr>
            <td>{$lang['lprix']}</td><td>{$ref['prix']}</td>
        </tr>
        <tr>
            <td>{$lang['lstock']}</td><td>{$ref['stock']}</td>
        </tr>
        <tr>
            <td>{$lang['lTVA']}</td><td>$TVA</td>
        </tr>
        <tr>
            <td>{$lang['lTTC']}</td><td>$TTC</td>
        </tr>
    </table>";
    }
   
}
?>

<DOCTYPE HTML>
    <html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title>Exercice 1</title>
        <link href="style.css" rel="stylesheet" media="screen">
    </head>
        <body>
            <?=$msg?>
        </body>
    </html>