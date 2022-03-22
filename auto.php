<?php
function trouveClasse($quoi){
echo "il manque $quoi <hr>";
include("classes/$quoi.php");
}



spl_autoload_register('trouveClasse');