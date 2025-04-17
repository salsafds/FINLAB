<?php
session_start();
session_destroy();
header("Location: ../page_akun.php");
exit();
?>
