<html>

<head>

    <?php

    @$explode = explode("/", $_GET["url"]);

    if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"])){

        $classeUsuario->idUsuario = $_COOKIE["id_usuario_ab"];
        $classeUsuario->emailUsuario = $_COOKIE["email_usuario_ab"];
        $classeUsuario->senhaUsuario = $_COOKIE["senha_usuario_ab"];

    }

    /* Chamando classe Capitulo */
    include "classes/capitulo.class.php";
    $classeCapitulo = new Capitulo();
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

    <link rel="stylesheet" href="css/capitulo.css" type="text/css">
    <script type="text/javascript" src="js/capitulo.js"></script>

    <!-- Scripts q n podem estar em páginas separadas -->
    <script>
        
        function selecionarVersao(livro){

            window.location=livro;

        }

    </script>

    <?php
    
    $controlePagina = "capitulo";
    
    ?>

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

        <!-- Barra azul com o título do livro -->
        <div id="barraTituloLivro" class="row justify-content-center">

            <div class="col-12 col-lg-9 text-light text-uppercase font-weight-bold">

                <p id="textoTituloBarraAzul">

                    <?php
                    
                    echo "{$explode[0]} {$explode[1]} - {$explode[2]}";
                    
                    ?>

                </p>

            </div>

        </div>
        <!-- /Barra azul com o título do livro -->

        <div class="row justify-content-center mt-3">

            

        </div>

        <!-- Rodapé -->
        <?php
        
        include "partes/rodape.php";
        
        ?>
        <!-- /Rodapé -->

    </div>

</body>

</html>