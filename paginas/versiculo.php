<html>

<head>

    <?php

    @$explode = explode("/", $_GET["url"]);

    /* Chamando classe Usuário */
    include "classes/usuario.class.php";
    $classeUsuario = new Usuario();

    if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"])){

        $classeUsuario->idUsuario = $_COOKIE["id_usuario_ab"];
        $classeUsuario->emailUsuario = $_COOKIE["email_usuario_ab"];
        $classeUsuario->senhaUsuario = $_COOKIE["senha_usuario_ab"];

    }
    
    include "classes/capitulo.class.php";
    $classeCapitulo = new Capitulo();

    /* Recebendo o ID do livro */
    $classeCapitulo->livro = $explode[0];
    $idLivro = $classeCapitulo->retornarIdLivro();

    /* Recebendo o ID da versao */
    $classeCapitulo->versao = $explode[3];
    $idVersao = $classeCapitulo->retornarIdVersao();

    /* Informando capítulo a classe */
    $classeCapitulo->capitulo = $explode[1];

    /* Informando versículo a classe */
    $classeCapitulo->verso = $explode[2];

    /* Obtendo a quantidade de cap[itulo do livro desejado */
    $qtdCapitulosPorLivro = $classeCapitulo->retornaQtdCapituloPorLivro($explode[1], $classeCapitulo->retornarIdLivro());
    
    ?>

    <title>Anotações Bíblicas</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <link rel="stylesheet" href="css/versiculo.css" type="text/css">

    <script>
        
        /* Seleciona versão */
        function selecionarVersao(livro){

            window.location=livro;

        }

        function trocarMenuMini(){

            var img = document.getElementById("menuMini")
            img.src="img/menuMiniPreto.png";

        }

        function voltarMenuMini(){

            var img = document.getElementById("menuMini")
            img.src="img/menuMini.png";

        }

        $(function () {
            $('#menuMini').popover({
            html: true,
            content: function() {
                    return $('#reportarVersoArea').html();
                }
            })
        })

    </script>

</head>

<body>

    <div class="container-fluid">
        
        <!-- Cabeçalho -->
        <?php

        if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"]) && $classeUsuario->verificaExistenciaUsuario() == true){

            include "partes/cabecalho_logado.php";
            
        }else{

            include "partes/cabecalho.php";

        }
        
        ?>
        <!-- /Cabeçalho -->

        <div class="row justify-content-center">

            <div class="col-12 col-lg-9 mt-3 pb-1">

                <h1><?php echo "{$explode[0]} {$explode[1]}" ?></h1>

                <!-- Seleção de versões -->
                <select id="versao" class="mb-3" onchange="selecionarVersao(this.value)">

                    <?php
                    
                    /* Retornando todas as versões disponíveis do banco de dados, e imprimindo na tela */
                    foreach($classeCapitulo->retornaVersoes() as $arrVersao){
                    
                    ?>

                    <?php
                    
                    if(strtolower($arrVersao["nome_curto"]) == $explode[2]){

                        $selected = "Selected";

                    }else{

                        $selected = "";

                    }
                    
                    ?>
                
                    <option value="<?php echo urlencode($explode[0])."/{$explode[1]}/".strtolower($arrVersao["nome_curto"]); ?>" <?php echo $selected ?>><?php echo "{$arrVersao["vrs_nome"]} - {$arrVersao["nome_curto"]}" ?></option>

                    <?php
                    
                    }
                    
                    ?>
                
                </select>

            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-12 col-lg-9">

                <img id="menuMini" onmouseover="trocarMenuMini()" onmouseout="voltarMenuMini()" class="float-right mt-2" src="img/menuMini.png" width="15px">

                <!-- <div id="reportarVersoArea" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item btn-sinalizar" onclick="if (window.confirm('Tem certeza que deseja sinalizar esse versículo aos administradores?')) {window.location='php/sinalizarVerso.php?livro='} else {}"><img src="img/icone-atencao.png" width="20px"> &nbsp; Infomar erro no versículo</a>
                    <div class="dropdown-divider"></div>
                    <p class="p-2 text-center text-secondary">
                        Clique no botão acima, para informar aos adiministradores erros no versículo, como tradução, formatação ou acentuação!
                    </p>
                </div> -->

                <div id="reportarVersoArea" class="dropdown-menu" aria-labelledby="dropdownMenu2">

                    <span>Relatar Erro</span><br>
                    <small>Caso tenha certeza que há algum erro nesse verso, informe abaixo e clique em relatar erro</small><br>

                    <textarea>erere</textarea>

                </div>

                <span id='numero_verso'><?php echo $explode[2]; ?></span> <span id="texto_capitulo"><?php echo $classeCapitulo->retornaVerso($idLivro, $idVersao); ?></span>

            </div>

        </div>

        <div class="row justify-content-center mt-2">

            <div class="col-12 col-lg-9">

                <img class="float-right ml-1" src="img/marcadorRoxo.png" width="20px">
                <img class="float-right ml-1" src="img/marcadorAzulClaro.png" width="20px">
                <img class="float-right ml-1" src="img/marcadorLaranja.png" width="20px">
                <img class="float-right ml-1" src="img/marcadorVerde.png" width="20px">
                <img class="float-right ml-1" src="img/marcadorAmarelo.png" width="20px">

            </div>

        </div>

        <div class="row justify-content-center mt-2">

            <div class="col-12 col-lg-9">

                <form>
                    <div class="form-group">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Faça sua anotação. Use # para criar um tópico, exemplo #Salvação"></textarea>
                      <small class="text-muted">15/11/2020 - 20:38 / 5 likes / 2 Respostas</small>
                    </div>
                </form>
                
            </div>

        </div>

        <div class="row justify-content-center" id="rowBotoes">

            <div class="col-12 col-lg-9">

                <button type="button" class="btn btn-outline-primary btn-sm float-right ml-2">Salvar</button>
                <button type="button" class="btn btn-outline-danger btn-sm float-right ml-2">Apagar</button>

                <div class="btn-group btn-group-toggle float-right area-btn-publico-privado" data-toggle="buttons">
                    <label class="btn btn-secondary btn-sm btn-publico-privado">
                        <input type="radio" name="privacidade" value="publico" id="option2" autocomplete="off" required disabled> Público
                    </label>
                    <label class="btn btn-secondary btn-sm btn-publico-privado">
                      <input type="radio" name="privacidade" value="privado" id="option3" autocomplete="off" required disabled> Privado
                    </label>
                </div>

            </div>

        </div>

        <div class="row justify-content-center mt-4">

            <div class="col-12 col-lg-9">
                
                <a href="#">< Voltar</a>
                
            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-12 col-lg-9">
                
                <h3 class="text-left mt-4">
                    
                    O que outros usuários estão comentando.
                    
                </h3>
                
            </div>

        </div>

        <div class="row justify-content-center mt-2">

            <div class="col-12 col-lg-9">
                
                <p class="text-secondary text-left font-weight-light">
                    
                    <img src="img/icone-atencao.png" width="20px"> &nbsp; Lembre-se, os comentários abaixo são de usuários ativos do Anotações Bíblicas, então como os bereanos (Atos 17:11), sempre confira se tudo está de acordo com as escrituras. Recomendamos um estudo mais profundo com a ajuda do agregador de conteúdo <a href="http://www.pelagraca.com.br/" target="_blank">Pela Graça</a>
                    
                </p>
                
            </div>

        </div>

        <div class="row justify-content-center mt-2 mb-3">

            <div class="col-2 col-md-1 col-lg-1 border-top pt-4">

                <img src="img/avatar/semImagem.jpg" class="float-left img-avatar mt-2 shadow-sm">

            </div>

            <div class="col-10 col-md-11 col-lg-8 border-top pt-4">

                <div class="row">

                    <div class="col">

                        <p class="text-left text-secondary bg-light p-3 rounded">

                            <img src="img/iconeSeguindo.png" width="20px">

                            <img class="float-right mt-2" src="img/menuMini.png" width="15px">
        
                            <a href="#" class="text-primary font-weight-bold">MarcosSilva</a>
        
                            Lembre-se, os comentários abaixo são de usuários ativos do Anotações Bíblicas, então como os bereanos (Atos 17:11), sempre confira se tudo está de acordo com as escrituras. Recomendamos um estudo mais profundo com a ajuda do agregador de conteúdo Lembre-se, os comentários abaixo são de usuários ativos do Anotações Bíblicas, então como os bereanos (Atos 17:11), sempre confira se tudo está de acordo com as escrituras. Recomendamos um estudo mais profundo com a ajuda do agregador de conteúdo Lembre-se, os comentários abaixo são de usuários ativos do Anotações
        
                            <br><small class="text-black-50 float-right mt-2">15/11/2020 - 20:38 / <span class="text-info">Editado</span></small><br>

                        </p>

                    </div>

                </div>

                <div class="row" id="rowCoracaoComent">

                    <div class="col text-right">

                        <a class="mr-3" href="#">Responder</a>

                        <span style="cursor: pointer" data-toggle="popover" data-placement="left" class="numeroLikes" id="qtdLike">5</span>

                        <img style="cursor:pointer" id="coracao" onclick="" src="img/coracao.png" width="30px">

                    </div>

                </div>

                <div class="row justify-content-center mt-3">

                    <!-- Começa a sessão de respostas -->

                    <div class="col-2 col-md-1 col-lg-1">
        
                        <img src="img/avatar/semImagem.jpg" class="float-left img-avatar-resposta mt-2 shadow-sm">
        
                    </div>
        
                    <div class="col-10 col-md-11 col-lg-11">
        
                        <div class="row">
        
                            <div class="col">
        
                                <p class="text-left text-secondary bg-light p-3 rounded">
        
                                    <img src="img/iconeSeguindo.png" width="20px">

                                    <img class="float-right mt-2" src="img/menuMini.png" width="15px">
                
                                    <a href="#" class="text-primary font-weight-bold">Erick Mota</a>
                
                                    MarcosSilva Lembre-se, os comentários abaixo são de usuários ativos do Anotações Bíblicas, então como os bereanos (Atos 17:11)
                
                                    <br><small class="text-black-50 float-right mt-2">15/11/2020 - 20:38</small><br>

                                </p>
        
                            </div>
        
                        </div>
        
                        <div class="row" id="rowCoracaoComent">
        
                            <div class="col text-right">

                                <a class="mr-3" href="#">Responder</a>
        
                                <span style="cursor: pointer" data-toggle="popover" data-placement="left" class="numeroLikes" id="qtdLike">5</span>
        
                                <img style="cursor:pointer" id="coracao" onclick="" src="img/coracaoVermelho.png" width="30px">
        
                            </div>
        
                        </div>
        
                    </div>

                </div>

                <div class="row justify-content-center mt-3">

                    <!-- Começa a sessão de respostas -->

                    <div class="col-2 col-md-1 col-lg-1">
        
                        <img src="img/avatar/semImagem.jpg" class="float-left img-avatar-resposta mt-2 shadow-sm">
        
                    </div>
        
                    <div class="col-10 col-md-11 col-lg-11">
        
                        <div class="row">
        
                            <div class="col">
        
                                <p class="text-left text-secondary bg-light p-3 rounded">
        
                                    <img src="img/iconeSeguindo.png" width="20px">

                                    <img class="float-right mt-2" src="img/menuMini.png" width="15px">
                
                                    <a href="#" class="text-primary font-weight-bold">Erick Mota</a>
                
                                    Lembre-se, os comentários abaixo são
                
                                    <br><small class="text-black-50 float-right mt-2">15/11/2020 - 20:38</small><br>

                                </p>
        
                            </div>
        
                        </div>
        
                        <div class="row" id="rowCoracaoComent">
        
                            <div class="col text-right">

                                <a class="mr-3" href="#">Responder</a>
        
                                <span style="cursor: pointer" data-toggle="popover" data-placement="left" class="numeroLikes" id="qtdLike">5</span>
        
                                <img style="cursor:pointer" id="coracao" onclick="" src="img/coracao.png" width="30px">
        
                            </div>
        
                        </div>
        
                    </div>

                </div>

            </div>

        </div>

        <div class="row justify-content-center mt-2 mb-3">

            <div class="col-2 col-md-1 col-lg-1 border-top pt-4">

                <img src="img/avatar/semImagem.jpg" class="float-left img-avatar mt-2 shadow-sm">

            </div>

            <div class="col-10 col-md-11 col-lg-8 border-top pt-4">

                <div class="row">

                    <div class="col">

                        <p class="text-left text-secondary bg-light p-3 rounded">

                            <img src="img/iconeSeguindo.png" width="20px">

                            <img class="float-right mt-2" src="img/menuMini.png" width="15px">
        
                            <a href="#" class="text-primary font-weight-bold">Erick Mota</a>
        
                            Lembre-se, os comentários abaixo são de usuários ativos do Anotações Bíblicas, então como os bereanos (Atos 17:11), sempre confira se tudo está de acordo com as escrituras. Recomendamos um estudo mais profundo com a ajuda do agregador de conteúdo Lembre-se, os comentários abaixo são de usuários ativos do Anotações Bíblicas, então como os bereanos (Atos 17:11), sempre confira se tudo está de acordo com as escrituras. Recomendamos um estudo mais profundo com a ajuda do agregador de conteúdo Lembre-se, os comentários abaixo são de usuários ativos do Anotações
        
                            <br><small class="text-black-50 float-right mt-2">15/11/2020 - 20:38 / <span class="text-info">Editado</span></small><br>

                        </p>

                    </div>

                </div>

                <div class="row" id="rowCoracaoComent">

                    <div class="col text-right">

                        <a class="mr-3" href="#">Responder</a>

                        <span style="cursor: pointer" data-toggle="popover" data-placement="left" class="numeroLikes" id="qtdLike">5</span>

                        <img style="cursor:pointer" id="coracao" onclick="" src="img/coracao.png" width="30px">

                    </div>

                </div>

            </div>

        </div>

        <div class="row justify-content-center mt-2 mb-3">

            <div class="col-2 col-md-1 col-lg-1 border-top pt-4">

                <img src="img/avatar/semImagem.jpg" class="float-left img-avatar mt-2 shadow-sm">

            </div>

            <div class="col-10 col-md-11 col-lg-8 border-top pt-4">

                <div class="row">

                    <div class="col">

                        <p class="text-left text-secondary bg-light p-3 rounded">

                            <img src="img/iconeSeguindo.png" width="20px">

                            <img class="float-right mt-2" src="img/menuMini.png" width="15px">
        
                            <a href="#" class="text-primary font-weight-bold">Erick Mota</a>
        
                            Lembre-se, os comentários abaixo são de usuários ativos do Anotações Bíblicas, então como os bereanos (Atos 17:11), sempre confira se tudo está de acordo com as escrituras. Recomendamos um estudo mais profundo com a ajuda do agregador de conteúdo Lembre-se, os comentários abaixo são de usuários ativos do Anotações Bíblicas, então como os bereanos (Atos 17:11), sempre confira se tudo está de acordo com as escrituras. Recomendamos um estudo mais profundo com a ajuda do agregador de conteúdo Lembre-se, os comentários abaixo são de usuários ativos do Anotações
        
                            <br><small class="text-black-50 float-right mt-2">15/11/2020 - 20:38</small><br>

                        </p>

                    </div>

                </div>

                <div class="row" id="rowCoracaoComent">

                    <div class="col text-right">

                        <a class="mr-3" href="#">Responder</a>

                        <span style="cursor: pointer" data-toggle="popover" data-placement="left" class="numeroLikes" id="qtdLike">5</span>

                        <img style="cursor:pointer" id="coracao" onclick="" src="img/coracao.png" width="30px">

                    </div>

                </div>

            </div>

        </div>

        <!-- Rodapé -->
        <?php
        
        include "partes/rodape.php";
        
        ?>
        <!-- /Rodapé -->

    </div>

</body>

</html>