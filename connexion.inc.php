<?php
$cnx = new mysqli("localhost","root","","librairie");

// Check connection
if ($cnx -> connect_errno) {
  echo "Failed to connect to MySQL: " . $cnx -> connect_error;
  exit();
}
?> 