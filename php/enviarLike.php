<?php

include '../classes/comentario.class.php';
$classeComentario = new Comentario();

$classeComentario->idUsuario = $_COOKIE["id_usuario_ab"];

$idComentario = $_POST["comentario"];

if($classeComentario->verificaLikeJaExecutado($idComentario) == true){
    
    $classeComentario->removeLike($idComentario);
    
}else{
    /* 
    $classeNotificacao->id_usuarios = $_COOKIE["id_usuario"];
    $classeNotificacao->id_usuarios_receber = $id_usuario_anotacao;
    $classeNotificacao->texto = "curtiu seu comentário";
    $classeNotificacao->data_notificacao = date("Y-m-d");
    $classeNotificacao->id_comentario = $idComentario; */
    
    /* if($classeNotificacao->verificarExistenciaNotificacao() == false){
        
        $classeNotificacao->inserirNotificacao();
        
    } */
    
    $classeComentario->insereLike($idComentario);
    
}

echo $classeComentario->retornaQtdLike($idComentario);

?>