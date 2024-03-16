<html>

<head>

    <?php

    @$explode = explode("/", $_GET["url"]);

    /* Chamando classe Capitulo */
    include "classes/capitulo.class.php";
    $classeCapitulo = new Capitulo();

    $busca = $_GET['q'];

    $classeCapitulo->busca = $busca;
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

    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    

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

        <div class="row justify-content-center mt-5">

            <div class="col-12 col-lg-9">

                <h3 class="mb-5">Buscando por: <?php echo $busca; ?></h3>
                
                <div id="espacoProdutos">

                <?php

                if($classeCapitulo->buscaVerso(0, 20, $busca) == false){

                    echo "Nada encontrado";
                    
                }else{
                
                foreach ($classeCapitulo->buscaVerso(0, 20, $busca) as $arrBusca){
                
                ?>

                <p class="border-bottom pb-4">

                    <input type="hidden" id="hiddenPg" value="2">

                    <b><?php echo $arrBusca["liv_nome"]; ?> <?php echo $arrBusca["ver_capitulo"]; ?>:<?php echo $arrBusca["ver_versiculo"]; ?></b> - <?php echo $arrBusca["ver_texto"]; ?>

                </p>

                <?php
                
                }

                }
                
                ?>

                </div>

            </div>

            <div class="col-12 col-lg-9 text-center mt-5">

                <button class="btn btn-primary" id="btnMais">Carregar mais</button>

            </div>

            <script>

                function retornaBusca(pg, busca) {
                                            
                    $.ajax({

                        type: "POST",
                        dataType: "html",

                        url: "ajax/busca.php",

                        /* beforeSend: function () {

                            var pgMenosUm = parseInt(pg) - 1;

                            $("#espacoProdutos"+pg).html("<img src='img/carregando.gif' width='60px'>");

                        }, */

                        data: {pg: pg, busca: busca},

                        success: function (msg) {

                            $("#espacoProdutos").append(msg);

                            $("#btnMais").removeClass("d-none");
                            $("#imgLoading").addClass("d-none");

                        }

                    });

                }

                $("#btnMais").click(function(){

                    $("#btnMais").addClass("d-none");
                    /* $("#imgLoading").removeClass("d-none"); */

                    var pg = document.getElementById("hiddenPg").value;

                    retornaBusca(pg, "<?php echo $busca; ?>");

                    $("#hiddenPg").val(parseInt(pg) + 1);

                    /* var pgMenosUm = parseInt(pg) - 1; */

                    /* $("<div class='row' id='espacoProdutos"+pg+"'></div>").insertAfter("#espacoProdutos"+pgMenosUm); */

                });

            </script>

        </div>

        <!-- Rodapé -->
        <?php
        
        include "partes/rodape.php";
        
        ?>
        <!-- /Rodapé -->

    </div>

</body>

</html>