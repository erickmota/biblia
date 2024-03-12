<?php

include "../classes/usuario.class.php";
$classeUsuario = new Usuario;

$classeUsuario->deslogar();

echo "<script>window.location='../'</script>";

?>