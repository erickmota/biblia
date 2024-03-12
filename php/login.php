<?php

include "../classes/usuario.class.php";
$classeUsuario = new Usuario;

$email = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["email"]);
$senha = str_replace(array(";", "'", "--", "/", "*", "xp_", "XP_", "SELECT" , "INSERT" , "UPDATE" , "DELETE" , "DROP", "select" , "insert" , "update" , "delete" , "drop"), "", $_POST["senha"]);

$classeUsuario->emailUsuario = $email;
$classeUsuario->senhaUsuario = $senha;

$classeUsuario->login();

echo "<script>window.location='../'</script>";

?>