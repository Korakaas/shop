<?php
require('auto.php');
require('vendor/autoload.php');

$action = $_GET['action']??'liste'; //action de mon uRL par défaut lisye 

//liste ou fiche
//echo $action; 

unset($_GET['action']);

$params = $_GET;

//print_r($params);

$actionControllerName = 'Action\\'.$action.'Controller';

$actionController = new $actionControllerName;

$mv = $actionController->process();

$liste = $mv->model->get();
$view = $mv->view;

include("vues/$view.tpl.php");

sage($model);