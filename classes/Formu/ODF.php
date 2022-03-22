<?php
namespace Formu;
//un champ de formulaire (base ou parent des autres)
 abstract class ODF{ //empeche l'instanciation de la classe
	protected $nom, $libelle; //on met en protected car héritage
	
	function __construct($n, $l=''){
		$this->nom = $n;
	$this->libelle=$l;
	}
	
	function getHtml(){
		return "<label>$this->libelle</label>";
	}
}