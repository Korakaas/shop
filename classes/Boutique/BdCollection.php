<?php
namespace Boutique;

class BdCollection {
	public $list = [];
	
	function add(Bd $obd) {
		//on type avec une classe : bd
		$this->list[] = $obd;
	}
	function get(){
		return $this->list;
	}
}