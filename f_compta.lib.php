<?php
define("TVA", 0.05);
function TTC($ht){
    $ttc = $ht+$ht*TVA;
    return $ttc;
}

