<html>

<head>

    <title>Anotações Bíblicas</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <?php

    /* Definindo a base para o site */
    include "php/base_paginas.php";
    
    ?>

    <link rel="stylesheet" href="css/login.css" type="text/css">

</head>

<body>

    <div class="container-fluid">

        <div class="row justify-content-center mt-5 pt-5">

            <div class="col text-center">

                <img src="img/logo.png" width="250px">

            </div>

        </div>

        <div class="row justify-content-center mt-2">

            <div class="col text-center">

                <h5 class="text-muted">

                    Faça seu login no AB

                </h5>

                <small class="text-muted">Seja bem vindo, faça o login para acessar sua conta</small>

            </div>

        </div>

        <div class="row justify-content-center mt-3">

            <div class="col-11 col-sm-8 col-md-5 col-xl-3 text-center">

                <form method="POST" action="./php/login.php">
                
                    <div class="form-group">

                        <input type="email" name="email" class="form-control" placeholder="E-mail">

                    </div>

                    <div class="form-group">

                        <input type="password" name="senha" class="form-control" placeholder="Senha">

                    </div>

                    <div class="form-group">

                        <div class="row">

                            <div class="col-6">

                                <button onclick="window.location='cadastro'" type="button" class="btn btn-secondary btn-block mt-2">Cadastrar-se</button>

                            </div>

                            <div class="col-6">

                                <button type="submit" class="btn btn-primary btn-block mt-2">Entrar</button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <div class="row justify-content-center mt-2">

            <div class="col-11 col-sm-8 col-md-5 col-xl-3">

                <p class="text-muted text-center">

                    <a id="linkVoltarNavegacao" onclick="history.back()">< Voltar à navegação</a> / Esqueci a senha

                </p>

            </div>

        </div>

    </div>

</body>

</html>