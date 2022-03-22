<?php
namespace Action;
class listeController{
	
	function process() {
		$mv = new \ModelAndView;
		$dao = new \Boutique\BdDao;
		$mv->model = $dao->getAll();	
		$mv->view = 'cata';
		return $mv;
	}
}