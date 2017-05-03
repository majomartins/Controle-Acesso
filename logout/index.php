<?php
include('../auth/controle_de_acesso.php');

session_destroy();
header("Location: /Controle-Acesso");
?>