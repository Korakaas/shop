<?php
namespace Boutique;
//Data Access Object pour les BDs
class BdDAO{
public $cnx;

function __construct(){
$this->cnx = mysqli_connect('localhost', 'root', '', 'librairie');
}

function getAll(){
$coll = new BdCollection;
$rs = mysqli_query($this->cnx, 'SELECT * FROM livres');

while($rec = mysqli_fetch_array($rs, MYSQLI_ASSOC)){
$coll->add(new Bd($rec));

}

return $coll;
}

function getOneByRef($ref){
$rs = mysqli_query($this->cnx, "SELECT * FROM livres WHERE ref='$ref'");
$rec = mysqli_fetch_array($rs, MYSQLI_ASSOC);
return new Bd($rec);
}
}