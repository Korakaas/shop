<?php
namespace Formu;
class Formulaire{
//nombre d'instances de cette classe
const MAX_INST = 2;
public static $nbr_inst = 0;
private $action='#';
private $methode='get';
public $libSubmit='OK';
private $listeChamps=[];
private $id;
private static $legalMethods = ['get', 'post'];

private static function isValidMethod($m){
return in_array($m, self::$legalMethods);
}

public static function getInstance($a, $m='get'){
if(self::isValidMethod($m) && self::$nbr_inst < self::MAX_INST){
return new self($a, $m);
}else{
return false;
}
}

private function __construct($a, $m='get'){
$this->setMethod($m);
$this->setAction($a);
$this->id = 'f_'. ++Formulaire::$nbr_inst;
}


public static function getNbrInst(){
//return Formulaire::$nbr_inst;
return self::$nbr_inst;
}

//accesseur ou getter = lecteur de propr.
private function getAction(){
return $this->action;
}
//mutateur ou setter = écriture de propr.
private function setMethod($m){
if($m == 'get' or $m == 'post'){
$this->methode = $m;
}
}
private function setAction($a){
$this->action = $a;
}
//injection de dépendance (DI)
function ajChamp($oChamp){
	if($oChamp instanceof \iHtml){ //on teste l'instanciiation de ODF ( et ses enfant)
		$this->listeChamps[] = $oChamp;
	}
}

function getHtml(){
$str = "<form id='$this->id' action = '$this->action' method='$this->methode'><br>\n";
foreach($this->listeChamps as $chp){
$str .= $chp->getHtml();
}
$str .= "<input type='submit' value='$this->libSubmit'><br>\n</form>";
return $str;
}


function __destruct(){
echo "adieu de $this->id !<hr>";
}

function __toString(){
return $this->getHtml();
}
}



//echo Formulaire::$nbr_inst;
//echo Formulaire::getNbrInst();
/*
$f[] = Formulaire::getInstance('doLivre1.php', 'post');
$f[] = Formulaire::getInstance('doLivre2.php', 'post');



echo join('<hr>', $f);




if($f = Formulaire::getInstance('doLivre1.php', 'get')){
$f->ajChamp('c_log', 'Login');
$f->ajChamp('c_pwd', 'Passe');
echo $f;
}else{
echo 'pb instanciation';
}



if($f = Formulaire::getInstance('doLivre2.php', 'get')){
$f->ajChamp('c_log', 'Login');
$f->ajChamp('c_pwd', 'Passe');
echo $f;
}else{
echo 'pb instanciation';
}



if($f = Formulaire::getInstance('doLivre3.php', 'get')){
$f->ajChamp('c_log', 'Login');
$f->ajChamp('c_pwd', 'Passe');
echo $f;
}else{
echo 'pb instanciation';
}



//unset($f);
//echo 'suite<hr>';
*/