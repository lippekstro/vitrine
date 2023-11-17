<?php
session_start();
session_unset();
session_destroy();
header('Location: /vitrine/views/login.php');
exit();
?>
