<?php
session_start();
unset($_SESSION['admins']);
setcookie("adminsLogin", json_encode($admins), strtotime("-30 day"), "/");
header("Location:login.php");
exit;
?>