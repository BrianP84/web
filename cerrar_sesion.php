<?php
session_start();
session_unset();
session_destroy();
header("Location: Iniciar_sesion.php");
exit();
?>