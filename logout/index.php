<?php

include "../auth/controledeacesso.php";

session_destroy();
header("location:../index.php");


?>