<?php
namespace Formu;
//un champ texte heriste du (est enfant de) de ODF
final class OFTP extends ODF implements \iHtml{ //on peut aussi mettre directement implemnts iHtml sur le parent ODF
	function getHtml(){
		$str = parent::getHtml();
		$str .="<input type='password' name='$this->nom'>" ;
		return $str;
	}
}

/*test
$c = new Champ('c_log', 'Login');
echo $c->getHtml();
*/

