<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->executeUpdate("UPDATE applicant set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  appid=".$_POST["id"]);;
?>