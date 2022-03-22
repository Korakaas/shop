<?php
namespace Formu;
//un champ texte heriste du (est enfant de) de ODF
final class ODFT extends ODF implements \iHtml{ //emêche la création d'eanfent d'ODFT
	private $val='';
	
	function __construct($n, $l='', $v=''){
			$this->val = $v;
			parent::__construct($n, $l);
	}
	function getHtml(){
		$str = parent::getHtml();
		$str .= "<input type='text' name='$this->nom' value='$this->val'>" ;
		return $str;
	}
}

/*test
$c = new Champ('c_log', 'Login');
echo $c->getHtml();
*/

