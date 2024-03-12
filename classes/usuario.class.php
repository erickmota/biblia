<?php

/* Função: Classe responsável por fazer o controle dos usuários do sistema
Autor: Erick Mota - erickmota.com */

class Usuario{

public $emailUsuario;
public $senhaUsuario;
public $idUsuario;
public $nomeUsuario;

/* Classe responsável por logar o usuário */
public function login(){

    include 'conexao.class.php';

    $idEncode = base64_encode($this->idUsuario);
    $emailEncode = base64_encode($this->emailUsuario);
    $senhaEncode = base64_encode($this->senhaUsuario);

    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$this->emailUsuario' and senha='$senhaEncode'");
    $qtd = mysqli_num_rows($sql);
    while($linha = mysqli_fetch_array($sql)) {
	
		$nome = $linha["nome"];
        $id = $linha["id"];
        $login = $linha["login"];
        $estado = $linha["estado"];
	
    }
    
    if($qtd == 1){

        if($estado == "pendente"){
                
            /* $novoEmail = base64_encode($this->email);
            
            die ("<script>window.location='../confirmacao/$novoEmail'</script>"); */
            
        }else{

            $idEncode = base64_encode($id);

            setcookie("id_usuario_ab", $idEncode, time() + 7 * (24 * 3600), "/");
            setcookie("email_usuario_ab", $emailEncode, time() + 7 * (24 * 3600), "/");
            setcookie("senha_usuario_ab", $senhaEncode, time() + 7 * (24 * 3600), "/");

            if($login == 0){
                
                /* $login2 = $login + 1;
                
                $sql2 = mysqli_query($conn, "UPDATE usuarios SET login='$login2' WHERE id='$id'");
                
                echo "<script>alert ('Vejo que você é novo por aqui ! Que tal aprender a usar o Anotações Bíblicas ?');window.location='../tutorial'</script>"; */
                
            }else{
                
                $loginPlus = $login + 1;
                
                $sql2 = mysqli_query($conn, "UPDATE usuarios SET login='$loginPlus' WHERE id='$id'");
                
                /* echo "<script>window.location='../'</script>"; */
                
            }

        }

    }else{

        setcookie("id_usuario_ab", null, -1, "/");
        setcookie("email_usuario_ab", null, -1, "/");
        setcookie("senha_usuario_ab", null, -1, "/");

        echo "<script>alert ('E-mail ou senha incorretos!'); history.back();</script>";

    }

}

/* Retorna a imagem do usuário */
public function retornaImagem(){
        
    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);
    $emailDecode = base64_decode($this->emailUsuario);
    
    $sql = mysqli_query($conn, "SELECT img FROM usuarios WHERE email='$emailDecode' and senha='$this->senhaUsuario' and id='$idDecode'");
    $linha = mysqli_fetch_array($sql);
    
    $img = $linha["img"];
    
    return $img;
            
}

/* Função para deslogar usuário */
public function deslogar(){
        
    setcookie("id_usuario_ab", null, -1, "/");
    setcookie("email_usuario_ab", null, -1, "/");
    setcookie("senha_usuario_ab", null, -1, "/");
    
}

/* Retorna dados do usuário pelo ID
Usando para:
*Retornar passagens marcadas
*Retornar Anotação Rápida do usuário */
public function retornaPassagensMarcadas(){

    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);
    $emailDecode = base64_decode($this->emailUsuario);

    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$emailDecode' and senha='$this->senhaUsuario' and id='$idDecode'");
    while ($row = mysqli_fetch_assoc($sql)){
            
        $array[] = $row;
        
    }

    return $array;

}

public function verificaExistenciaUsuario(){

    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);
    $emailDecode = base64_decode($this->emailUsuario);

    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$emailDecode' and senha='$this->senhaUsuario' and id='$idDecode'");
    $qtd = mysqli_num_rows($sql);

    if($qtd < 1){

        setcookie("id_usuario_ab", null, -1, "/");
        setcookie("email_usuario_ab", null, -1, "/");
        setcookie("senha_usuario_ab", null, -1, "/");

        echo "<script>window.location=''</script>";

        return false;

    }else{

        return true;

    }

}

public function salvarAnotacaoRapida($texto){

    include 'conexao.class.php';

    $idDecode = base64_decode($this->idUsuario);

    $sql = mysqli_query($conn, "UPDATE usuarios SET anotacoesrapidas='$texto' WHERE id='$idDecode'") or die("Erro Anotações Rápidas");

}
    
}

?>