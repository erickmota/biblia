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

    $classeCapitulo->livro = $explode[0];

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

    <link rel="stylesheet" href="css/numero_capitulo.css" type="text/css">

    <script>

        /* Função JS com PHP para ir para o capítulo selecionado */
        function irParaCapitulo(capitulo){

            window.location="<?php echo urlencode($explode[0]) ?>/" + capitulo + "/<?php echo $explode[1] ?>";

        }

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

            <div class="col-12 col-lg-9 mt-3 border-bottom pb-1">

                <h1><?php echo $explode[0] ?></h1>

            </div>

        </div>

        <div id="corpoNumeros" class="row justify-content-center pt-3">

            <div id="espacoNumeros" class="col-12 col-lg-9">

                <div class="row">

                    <?php

                    /* Mostrando na tela os números do capítulo */
                    $i = 1;

                    while($i <= $qtdCapitulosPorLivro){

                    ?>

                        <div id="numeroIsolado" class="col-2 col-md-1 text-center" onclick="irParaCapitulo(<?php echo $i; ?>)"><?php echo $i; ?></div>

                    <?php

                        $i++;

                    }
                    
                    ?>

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