<?php

include '../classes/comentario.class.php';
$classeComentario = new Comentario();

$idComentario = $_POST["comentario"];

if($classeComentario->retornaQuemDeuLike($idComentario) == false){

    echo "<span class='text-black-50'>Nenhum like</span>";

}else{

    foreach($classeComentario->retornaQuemDeuLike($idComentario) as $arrComentario){

        echo $arrComentario["nome"]."<br>";
    
    }

}

?>