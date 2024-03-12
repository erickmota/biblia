<html>

<head>

    <?php
    
    /* Chamando classe Usuário */
    include "classes/usuario.class.php";
    $classeUsuario = new Usuario();

    if(isset($_COOKIE["id_usuario_ab"]) && isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"])){

        $classeUsuario->idUsuario = $_COOKIE["id_usuario_ab"];
        $classeUsuario->emailUsuario = $_COOKIE["email_usuario_ab"];
        $classeUsuario->senhaUsuario = $_COOKIE["senha_usuario_ab"];

    }
    
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

    <link rel="stylesheet" href="css/home.css" type="text/css">
    <script type="text/javascript" src="js/home.js"></script>

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

        <!-- Verso do dia -->
        <div class="row justify-content-center mt-3">

            <div class="col-12 col-lg-9">

                <h3>Verso do dia</h3>

                <p>

                    Mas, sentindo o vento forte, teve medo; e, começando a ir para o fundo, clamou, dizendo: Senhor, salva-me!
                    E logo Jesus, estendendo a mão, segurou-o, e disse-lhe: Homem de pouca fé, por que duvidaste?

                </p>

                <p class="text-right">

                    Mateus 14:30,31

                </p>

            </div>

        </div>
        <!-- /Verso do dia -->

        <!-- Novo Testamento -->
        <div id="blocoNovoTestamento" class="row justify-content-center mt-3">

            <div class="col-12 col-lg-9">

                <div class="row">

                    <div class="col">

                        <h4>Novo Testamento</h4>

                    </div>

                </div>

                <div class="row text-center mt-2">

                    <div class="col-12 col-sm-6 col-md-3">

                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Mateus')">Mateus</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Marcos')">Marcos</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Lucas')">Lucas</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('João')">João</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Atos')">Atos</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Romanos')">Romanos</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('1+Coríntios')">1 Coríntios</p>
        
                    </div>
        
                    <div class="col-12 col-sm-6 col-md-3">
        
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('2+Coríntios')">2 Coríntios</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Gálatas')">Gálatas</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Efésios')">Efésios</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Filipenses')">Filipenses</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Colossenses')">Colossenses</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('1+Tessalonicenses')">1 Tessalonicenses</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('2+Tessalonicenses')">2 Tessalonicenses</p>
        
                    </div>
        
                    <div class="col-12 col-sm-6 col-md-3">
        
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('1+Timóteo')">1 Timóteo</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('2+Timóteo')">2 Timóteo</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Tito')">Tito</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Filemom')">Filemom</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Hebreus')">Hebreus</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Tiago')">Tiago</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('1+Pedro')">1 Pedro</p>
        
                    </div>
        
                    <div class="col-12 col-sm-6 col-md-3">
        
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('2+Pedro')">2 Pedro</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('1+João')">1 João</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('2+João')">2 João</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('3+João')">3 João</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Judas')">Judas</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Apocalipse')">Apocalipse</p>
        
                    </div>

                </div>

            </div>

        </div>
        <!-- /Novo Testamento -->

        <!-- Velho Testamento -->
        <div id="blocoVelhoTestamento" class="row justify-content-center mt-3">

            <div class="col-12 col-lg-9">

                <div class="row">

                    <div class="col">

                        <h4>Velho Testamento</h4>

                    </div>

                </div>

                <div class="row text-center mt-2">

                    <div class="col-12 col-sm-6 col-md-3">

                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Gênesis')">Gênesis</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Êxodo')">Êxodo</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Números')">Números</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Deuteronômio')">Deuteronômio</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Josué')">Josué</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Juízes')">Juízes</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Rute')">Rute</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('1+Samuel')">1 Samuel</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('2+Samuel')">2 Samuel</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('1+Reis')">1 Reis</p>
        
                    </div>
        
                    <div class="col-12 col-sm-6 col-md-3">
        
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('2+Reis')">2 Reis</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('1+Crônicas')">1 Crônicas</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('2+Crônicas')">2 Crônicas</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Esdras')">Esdras</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Neemias')">Neemias</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Ester')">Ester</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Jó')">Jó</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Salmos')">Salmos</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Provérbios')">Provérbios</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Eclesiastes')">Eclesiastes</p>
        
                    </div>
        
                    <div class="col-12 col-sm-6 col-md-3">
        
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Cânticos')">Cânticos</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Isaías')">Isaías</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Lamentações')">Lamentações</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Ezequiel')">Ezequiel</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Daniel')">Daniel</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Oséias')">Oséias</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Joel')">Joel</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Amós')">Amós</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Obadias')">Obadias</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Jonas')">Jonas</p>
        
                    </div>
        
                    <div class="col-12 col-sm-6 col-md-3">
        
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Miquéias')">Miquéias</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Naum')">Naum</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Habacuque')">Habacuque</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Sofonias')">Sofonias</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Ageu')">Ageu</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Zacarias')">Zacarias</p>
                        <p id="nomeLivro" class="p-2" onclick="irParaLivro('Malaquias')">Malaquias</p>
        
                    </div>

                </div>

            </div>

        </div>
        <!-- /Velho Testamento -->

        <!-- Rodapé -->
        <?php
        
        include "partes/rodape.php";
        
        ?>
        <!-- /Rodapé -->

    </div>

</body>

</html>