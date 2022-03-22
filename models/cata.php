<?php
//model de catalogue
$dao = new Boutique\BdDAO;



$liste = $dao->getAll()->get();



include("views/$vue.tpl.php");