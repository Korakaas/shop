<?php
//model de catalogue
$dao = new Boutique\BdDAO;



$liste = $dao->getAll()->get();



include("vues/$vue.tpl.php");