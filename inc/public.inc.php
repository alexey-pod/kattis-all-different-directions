<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE); 

$site_dir = $_SERVER['DOCUMENT_ROOT'];

include ($site_dir."/inc/classes/caseClass.php");
include ($site_dir."/inc/classes/pointClass.php");
?>