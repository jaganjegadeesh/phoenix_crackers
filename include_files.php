<?php
session_start();


include("include/label.php");
include("include/functions.php");
include("include/validation.php");

$obj = new billing();
$creation_obj = new Creation_functions();
$valid = new validation();
?>