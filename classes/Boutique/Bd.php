<?php
namespace Boutique;

class Bd{
	public $ref, $titre, $auteur, $prix, $editeur, $resume;
	
	function __construct(Array $tdata){
		foreach ($tdata as $cle=>$val){
			$this->$cle = $val;
		}
	}
}