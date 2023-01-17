<?php 
// Logout
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// logout cookie
// setcookie(key, '', time() - waktu mundur)
setcookie('id','',time()-3600);
setcookie('key','',time()-3600);

header('Location:login.php')
?>