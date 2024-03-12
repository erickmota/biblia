<?php

include '../classes/usuario.class.php';
$classeUsuario = new Usuario();

$texto = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["anotacao"]);

$classeUsuario->idUsuario = $_COOKIE["id_usuario_ab"];

$classeUsuario->salvarAnotacaoRapida($texto);

?>

<img class="float-right mt-1" src="img/ok.png" width="23px"> <span class="float-right mt-1 mr-2">Salvo!</span>