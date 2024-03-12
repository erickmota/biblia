<?php

/* Função: Classe responsável por fazer o controle dos comentários do sistema
Autor: Erick Mota - erickmota.com */

class Comentario{

public $idUsuario;
public $livro;
public $capitulo;
public $numeroVersiculo;

/* Retorna as anotações para o usuário na página do capítulo */
public function retornaAnotacaoPorVerso(){

    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);
        
    $sql = mysqli_query($conn, "SELECT * FROM comentarios WHERE id_usuario='$idDecode' AND livro='$this->livro' AND capitulo='$this->capitulo' AND numero_versiculo='$this->numeroVersiculo'");
    $row = mysqli_num_rows($sql);
    while ($linha = mysqli_fetch_array($sql)) {
        
        $coment = $linha["texto"];
        
        /* $coment2 = str_replace("<br><br>", "|", $coment); */

        if($row < 1){

            return false;

        }else{

            return $coment;

        }
        
    }

}

/* Retorna as anotações e informações dos usuários sendo seguidos */
public function retornaAnotacaoSguindo(){

    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);

    /* $sql = mysqli_query($conn, "SELECT usuarios.* FROM usuarios INNER JOIN comentarios ON comentarios.id_usuario=usuarios.id INNER JOIN seguir ON usuarios.id=seguir.id_seguindo WHERE seguir.id_seguidor='$idDecode' AND comentarios.livro='$this->livro' AND comentarios.capitulo='$this->capitulo' AND comentarios.numero_versiculo='$this->numeroVersiculo' AND comentarios.privacidade='publico'"); */
    $sql = mysqli_query($conn, "SELECT comentarios.id AS id_c, comentarios.texto AS texto, usuarios.img AS img, usuarios.id AS id, usuarios.nome AS nome FROM comentarios INNER JOIN usuarios ON usuarios.id=comentarios.id_usuario INNER JOIN seguir ON usuarios.id=seguir.id_seguindo WHERE seguir.id_seguidor='$idDecode' AND comentarios.livro='$this->livro' AND comentarios.capitulo='$this->capitulo' AND comentarios.numero_versiculo='$this->numeroVersiculo' AND comentarios.privacidade='publico'");
    $qtd = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_assoc($sql)){
            
        $array[] = $row;
        
    }

    if($qtd < 1){

        return false;

    }else{

        return $array;

    }

}

/* Formata as anotações de maneira correta */
public function formataAnotacao($anotacao, $idVersiculo, $tamanho){

    $explode = explode(" ", $anotacao);

    $numExplode = count($explode);

    $i = 0;

    if($tamanho == "pequeno") {

        echo "<pre class='text-danger'>";

        while($i <= 90){

            if(preg_match('/^http:/', @$explode[$i]) or preg_match('/^https:/', @$explode[$i])){
    
                echo "<a style='font-size:15px; color: #00a8ec' href='$explode[$i]' target='_blank'>$explode[$i]</a> "; /* ! */
    
            }else if(preg_match('/^#/', @$explode[$i])){
    
                echo "<a style='font-size:15px; color: #00a8ec' href='$explode[$i]' target='_blank'>$explode[$i]</a> "; /* ! */
                
            }else{
                                        
                echo @$explode[$i]." ";
                
            }
    
            $i++;
    
        }

    }else{

        echo "<pre>";

        while($i <= $numExplode){

            if(preg_match('/^http:/', @$explode[$i]) or preg_match('/^https:/', @$explode[$i])){
    
                echo "<a style='font-size:15px; color: #00a8ec' href='$explode[$i]' target='_blank'>$explode[$i]</a> "; /* ! */
    
            }else if(preg_match('/^#/', @$explode[$i])){
    
                echo "<a style='font-size:15px; color: #00a8ec' href='$explode[$i]' target='_blank'>$explode[$i]</a> "; /* ! */
                
            }else{
                                        
                echo @$explode[$i]." ";
                
            }
    
            $i++;
    
        }

    }

    if($tamanho == "pequeno" && $numExplode > 90){
                            
        echo "... <a href='' data-toggle='modal' data-target='.bd-modal-$idVersiculo-lg'>Ver mais</a>"; /* ! */

    }

    echo "</pre>";

}

/* Retorna a quantidade de likes de um comentário */
public function retornaQtdLike($idComentario){
        
    include 'conexao.class.php';
    
    $sql = mysqli_query($conn, "SELECT * FROM likes WHERE id_comentario=$idComentario");
    $qtdSql = mysqli_num_rows($sql);
    
    return $qtdSql;
    
}

/* Verificar se já existe like no comentário */
public function verificaLikeJaExecutado($idComentario){
        
    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);
    
    $sql = mysqli_query($conn, "SELECT * FROM likes WHERE id_usuario=$idDecode AND id_comentario=$idComentario");
    $qtdSql = mysqli_num_rows($sql);
    
    if($qtdSql > 0){
        
        return true;
        
    }else{
        
        return false;
        
    }
    
}

/* Insere Likes no BD */
public function insereLike($idComentario){
        
    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);
    
    $sql = mysqli_query($conn, "INSERT INTO likes (id_usuario, id_comentario) VALUES ($idDecode, $idComentario)");
    
    $sql2 = mysqli_query($conn, "SELECT likes FROM comentarios WHERE id=$idComentario");
    $linha = mysqli_fetch_array($sql2);
    
    $like = $linha["likes"] + 1;
    
    $sql3 = mysqli_query($conn, "UPDATE comentarios SET likes=$like WHERE id=$idComentario");
    
}

/* Remove Likes do BD */
public function removeLike($idComentario){
        
    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);
    
    $sql = mysqli_query($conn, "DELETE FROM likes WHERE id_usuario=$idDecode AND id_comentario=$idComentario");
    
    $sql2 = mysqli_query($conn, "SELECT likes FROM comentarios WHERE id=$idComentario");
    $linha = mysqli_fetch_array($sql2);
    
    $like = $linha["likes"] - 1;
    
    $sql3 = mysqli_query($conn, "UPDATE comentarios SET likes=$like WHERE id=$idComentario");
    
}

/* Retorna as pessoas que deram like no comentário */
public function retornaQuemDeuLike($idComentario){

    include 'conexao.class.php';

    $sql = mysqli_query($conn, "SELECT usuarios.nome FROM usuarios INNER JOIN likes ON usuarios.id=likes.id_usuario WHERE likes.id_comentario=$idComentario");
    $qtd = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_assoc($sql)){
            
        $array[] = $row;
        
    }

    if($qtd < 1){

        return false;

    }else{

        return $array;

    }

}

/* Retorna as passagens marcadas */
public function retornaMarcacao(){

    include "conexao.class.php";

    $idDecode = base64_decode($this->idUsuario);

    $sql = mysqli_query($conn, "SELECT cor FROM marcacoes WHERE id_usuario=$idDecode AND livro='$this->livro' AND capitulo='$this->capitulo' AND versiculo=$this->numeroVersiculo");
    $qtd = mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);

    $cor = $row["cor"];

    if($qtd < 1){

        return null;

    }else{

        return $cor;

    }

}

}

?>