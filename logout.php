<?php


session_start("logado");
session_destroy();
header("LOCATION: index.php");

?>