<?php

/* Função: Classe responsável por fazer o controle dos capítulos do sistema
Autor: Erick Mota - erickmota.com */

class Capitulo{

public $livro;
public $capitulo;
public $versao;
public $verso;

/* Classe responsável por retornar o ID do livro desejado */
public function retornarIdLivro(){

    include 'conexao.class.php';

    $sql = mysqli_query($conn, "SELECT * FROM livros WHERE liv_nome='$this->livro'");
    $row = mysqli_fetch_array($sql);
    $idLivro = $row["liv_id"];

    return $idLivro;

}

/* Classe responsável por retornar i ID da versão */
public function retornarIdVersao(){

    include 'conexao.class.php';

    $sql = mysqli_query($conn, "SELECT * FROM versoes WHERE nome_curto='$this->versao'");
    $row = mysqli_fetch_array($sql);
    $idVersao = $row["vrs_id"];

    return $idVersao;

}

/* Classe responsável por exibir o capítulo na página de leitura */
public function exibirCapitulo($idLivro, $idVersao){

    include 'conexao.class.php';

    $sql = mysqli_query($conn, "SELECT * FROM versiculos WHERE ver_liv_id='$idLivro' AND ver_capitulo='$this->capitulo' AND ver_vrs_id='$idVersao' ORDER BY ver_id");
    while ($row = mysqli_fetch_assoc($sql)){
            
        $array[] = $row;
        
    }

    return $array;
    
}

public function retornaVerso($idLivro, $idVersao){

    include 'conexao.class.php';

    $sql = mysqli_query($conn, "SELECT * FROM versiculos WHERE ver_liv_id='$idLivro' AND ver_capitulo='$this->capitulo' AND ver_vrs_id='$idVersao' AND ver_versiculo='$this->verso'");
    $row = mysqli_fetch_array($sql);
    $verso = $row["ver_texto"];

    return $verso;


}

/* Função responsável por retroceder um capítulo */
public function voltarCapitulo($livro, $capitulo, $versao){
        
    $livroUrl = urlencode($livro);
    
    include "conexao.class.php";
    
    $somaCapitulo = $capitulo - 1;
    
    $sql = mysqli_query($conn, "SELECT * FROM livros WHERE liv_nome='$livro'");
    while ($row = mysqli_fetch_array($sql)) {
        
        $idLivro = $row["liv_id"];
        $idLivro2 = $row["liv_id"] - 1;
        
        $sql2 = mysqli_query($conn, "SELECT ver_capitulo FROM versiculos WHERE ver_vrs_id='$versao' AND ver_liv_id='$idLivro' ORDER By ver_capitulo DESC");
        $linha = mysqli_fetch_array($sql2);
        
        $sql6 = mysqli_query($conn, "SELECT ver_capitulo FROM versiculos WHERE ver_vrs_id='$versao' AND ver_liv_id='$idLivro2' ORDER By ver_capitulo DESC");
        $linha6 = mysqli_fetch_array($sql6);
        
        $cap = $linha["ver_capitulo"];
        $cap6 = $linha6["ver_capitulo"];
        
        if($somaCapitulo <= $cap && $somaCapitulo > 0){
            
            /* Um echo aparece se a tela for grande, e o outro aparece se a tela for pequena */
            echo "<a class='d-none d-md-block' href='./$livroUrl/$somaCapitulo/$this->versao'>< $livro $somaCapitulo</a>";
            echo "<a class='d-block d-md-none' href='./$livroUrl/$somaCapitulo/$this->versao'><<</a>";
            
        }else{
            
            $somaLivro = $idLivro - 1;
            
            $sql3 = mysqli_query($conn, "SELECT * FROM livros WHERE liv_id='$somaLivro'");
            $linha2 = mysqli_fetch_array($sql3);
            
            $nome = $linha2["liv_nome"];
            
            $nomeUrl = urlencode($nome);
            
            if($nome == NULL){
                
                echo "";
                
            }else{
                
                /* Um echo aparece se a tela for grande, e o outro aparece se a tela for pequena */
                echo "<a class='d-none d-md-block' href='./$nomeUrl/$cap6/$this->versao'>< $nome $cap6</a>";
                echo "<a class='d-block d-md-none' href='./$nomeUrl/$cap6/$this->versao'><<</a>";
                
            }
            
        }
        
        
    }
    
}

/* Função responsável por avançar um capítulo */
public function avancarCapitulo($livro, $capitulo, $versao){
        
    $livroUrl = urlencode($livro);
    
    include "conexao.class.php";
    
    $somaCapitulo = $capitulo + 1;
    
    $sql = mysqli_query($conn, "SELECT * FROM livros WHERE liv_nome='$livro'");
    while ($row = mysqli_fetch_array($sql)) {
        
        $idLivro = $row["liv_id"];
        
        $sql2 = mysqli_query($conn, "SELECT ver_capitulo FROM versiculos WHERE ver_vrs_id='$versao' AND ver_liv_id='$idLivro' ORDER By ver_capitulo DESC");
        $linha = mysqli_fetch_array($sql2);
        
        $cap = $linha["ver_capitulo"];
        
        if($somaCapitulo <= $cap){
            
            /* Um echo aparece se a tela for grande, e o outro aparece se a tela for pequena */
            echo "<a class='d-none d-md-block' href='./$livroUrl/$somaCapitulo/$this->versao'>$livro $somaCapitulo ></a>";
            echo "<a class='d-block d-md-none' href='./$livroUrl/$somaCapitulo/$this->versao'>>></a>";
            
        }else{
            
            $somaLivro = $idLivro + 1;
            
            $sql3 = mysqli_query($conn, "SELECT * FROM livros WHERE liv_id='$somaLivro'");
            $linha2 = mysqli_fetch_array($sql3);
            
            $nome = $linha2["liv_nome"];
            
            $nomeUrl = urlencode($nome);
            
            if($nome == NULL){
                
                echo "";
                
            }else{
                
                /* Um echo aparece se a tela for grande, e o outro aparece se a tela for pequena */
                echo "<a class='d-none d-md-block' href='./$nomeUrl/1/$this->versao'>$nome 1 ></a>";
                echo "<a class='d-block d-md-none' href='./$nomeUrl/1/$this->versao'>>></a>";
                
            }
            
        }
        
        
    }
    
}

/* Função responsável por retornar a quantidade de capítulo existente por livro */
public function retornaQtdCapituloPorLivro($versao, $idLivro){
        
    include 'conexao.class.php';
    
    $livro = $this->livro;
        
    /* Estou acrescentando o "ver_versiculo" a busca, porque, como na tabela do BD existem muitos versos de um mesmo capítulo,
    o número do capítulo seria repetido muitas vezes. */
    $sql = mysqli_query($conn, "SELECT ver_capitulo FROM versiculos WHERE ver_liv_id='$idLivro' AND ver_vrs_id='2' AND ver_versiculo='1' ORDER BY ver_capitulo desc");

    $qtd = mysqli_num_rows($sql);

    return $qtd;

}

/* Função para retornar as versões disponíveis no BD */
public function retornaVersoes(){

    include 'conexao.class.php';

    $sql = mysqli_query($conn, "SELECT * FROM versoes WHERE nome_curto!=''");
    while ($row = mysqli_fetch_assoc($sql)){
            
        $array[] = $row;
        
    }

    return $array;

}

/* Salvar passagem quando há um usuário ativo */
public function salvarPassagem($posicao){
        
    include "conexao.class.php";
    
    $idUsuario = $_COOKIE["id_usuario_ab"];

    $idDecode = base64_decode($idUsuario);
    
    $sql = mysqli_query($conn, "UPDATE usuarios SET livro$posicao='$this->livro' WHERE id='$idDecode'") or die("Erro salvar passagem");
    $sql = mysqli_query($conn, "UPDATE usuarios SET capitulo$posicao='$this->capitulo' WHERE id='$idDecode'") or die("Erro salvar passagem");
    
}

public function denunciarVerso($erroTexto){

    include "conexao.class.php";

    $sql = mysqli_query($conn, "INSERT passagens_erradas (livro, capitulo, verso, erro_texto) VALUES ('$this->livro', $this->capitulo, $this->verso, '$erroTexto')");

}

}

?>