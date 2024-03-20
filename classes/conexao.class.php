<?php

$conn = mysqli_connect("localhost", "root", "");
$bd = mysqli_select_db($conn, "anotacoes_biblicas") or die ("Erro BD");

mysqli_query($conn, "SET NAMES utf8");
date_default_timezone_set('America/Sao_Paulo');

?>