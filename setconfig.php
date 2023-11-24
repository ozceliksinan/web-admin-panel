<?php
require_once 'netting/class.crud.php';
$db = new crud();
if (!isset($_SESSION['admins']) && isset($_COOKIE['adminsLogin'])) {
	$adminsLogin = json_decode($_COOKIE['adminsLogin']);
	$sonuc = $db->adminsLogin($adminsLogin->admins_username, $adminsLogin->admins_pass, TRUE);
	if ($sonuc['status']) {
		header("Location:index.php");
		exit;
	}
}
if (!isset($_SESSION['admins']) && !isset($_COOKIE['adminsLogin'])) {
	header("Location:login.php");
	exit;
}
?>