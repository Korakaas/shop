<?php
class Champ{
	private $nom;
	private $libelle;
	
	function __construct($n, $l=''){
		$this->nom = $n;
		$this->libelle = $l;
	}
	function getHtml(){
		$str = "$this->libelle : <input type='text' name='$this->nom'>" ;
		return $str;
	}
}

/*test
$c = new Champ('c_log', 'Login');
echo $c->getHtml();
*/

