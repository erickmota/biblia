<?php

if(isset($_GET["url"])){

    $explode = explode("/", $_GET["url"]);

    $versao = $explode[1];

}

?>

<link rel="stylesheet" type="text/css" href="css_partes/cabecalho.css">

<script>

$(function () {
    $('.menuPrincipal').popover({
    html: true,
    content: function() {
            return $('#menuPrincipal-popover').html();
        }
    })
})

$(function () {
    $('.menuLogin').popover({
    html: true,
    content: function() {
            return $('#menuLogin-popover').html();
        }
    })
})
    
</script>

<div class="row justify-content-center mt-2">

    <div class="col-12 col-lg-9">

        <div class="row">

            <div class="d-none d-sm-block col-sm-3 col-md-3 col-lg-3">

                <img onclick="window.location='./'" id="logo" class="d-none d-md-block" src="img/logo.png" width="150px">

                <img onclick="window.location='./'" id="logoM" class="d-block d-md-none" src="img/logoMenor.png" height="52px">

            </div>


            <div class="col-7 col-sm-6 col-md-6 col-lg-6">

                <form class="mt-3" method="GET" action="./acf/busca">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar" name="q" required>
                    </div>
                </form>

            </div>

            <div class="col-5 col-sm-3 col-md-3 col-lg-3">

                <div class="row">

                    <div class="col">

                        

                    </div>

                    <div class="col">

                        <img id="iconeMenu" class="mt-3 float-right menuPrincipal" src="img/menu.png" width="40px" data-toggle="popover" data-placement="bottom">

                        <!-- Menu principal -->
                        <div id="menuPrincipal-popover" style="display: none">
                        
                            <a id="linkMenu" href=""><p class="border-bottom pb-3 mt-3 pr-3 pl-3"><img id="iconesMenu" src="./img/casa.png" width="20px"> Início</p></a>
                            <a id="linkMenu" href="#blocoNovoTestamento"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/novoTestamento.png" width="20px"> Novo Testamento</p></a>
                            <a id="linkMenu" href="#blocoVelhoTestamento"><p class="pr-3 pl-3"><img id="iconesMenu" src="./img/velhoTestamento.png" width="20px"> Velho Testamento</p></a>
                    
                        </div>

                    </div>

                </div>
                
            </div>

        </div>

    </div>

</div>