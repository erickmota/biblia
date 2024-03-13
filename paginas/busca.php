<html>

<head>

    <?php

    @$explode = explode("/", $_GET["url"]);

    /* Chamando classe Capitulo */
    include "classes/capitulo.class.php";
    $classeCapitulo = new Capitulo();

    $classeCapitulo->busca = $explode[1];
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

        include "partes/cabecalho.php";
        
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

        <div class="row justify-content-center mt-5">

            <div class="col-12 col-lg-9">

                <h3 class="mb-5">Buscando por: Teste</h3>

                <?php
                
                foreach ($classeCapitulo->buscaVerso() as $arrBusca){
                
                ?>
                
                <p class="border-bottom pb-4">

                    <b><?php echo $classeCapitulo->retornaLivroPorId($arrBusca["ver_liv_id"]); ?> <?php echo $arrBusca["ver_capitulo"]; ?>:<?php echo $arrBusca["ver_versiculo"]; ?></b> - <?php echo $arrBusca["ver_texto"]; ?>

                </p>

                <?php
                
                }
                
                ?>

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