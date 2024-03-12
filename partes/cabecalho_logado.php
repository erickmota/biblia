<link rel="stylesheet" type="text/css" href="css_partes/cabecalho_logado.css">

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
  $('.menuAvatar').popover({
    html: true,
    content: function() {
            return $('#menuAvatar-popover').html();
        }
  })
})

</script>

<div class="row justify-content-center mt-2">

    <div class="col-12 col-lg-9">

        <div class="row">

            <div class="d-none d-sm-block col-sm-2 col-md-3 col-lg-3">

                <img onclick="window.location='./'" id="logo" class="d-none d-md-block" src="img/logo.png" width="150px">

                <img onclick="window.location='./'" id="logo" class="d-block d-md-none" src="img/logoMenor.png" height="52px">

            </div>


            <div class="col-5 col-sm-6 col-md-6 col-lg-6">

                <form class="mt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                    </div>
                </form>

            </div>

            <div class="col-7 col-sm-4 col-md-3 col-lg-3">

                <div class="row">

                    <div class="col">

                        <img id="iconeNotificacao" class="float-right" src="img/notificacaoCheia.png" width="18px">

                    </div>
                    
                    <div class="col">

                        <?php
                        
                        if($classeUsuario->retornaImagem() == NULL){

                        ?>

                            <img id="avatarMenu" class="float-right menuAvatar" src="img/avatar/semImagem.jpg" data-toggle="popover" data-placement="bottom">

                        <?php

                        }else{

                        ?>

                            <img id="avatarMenu" class="float-right menuAvatar" src="img/avatar/<?php echo $classeUsuario->retornaImagem() ?>" data-toggle="popover" data-placement="bottom">

                        <?php

                        }
                        
                        ?>

                        <!-- Menu do avatar -->
                        <div id="menuAvatar-popover" style="display: none">
                        
                            <a id="linkMenu" href="#"><p class="border-bottom pb-3 mt-3 pr-3 pl-3"><img id="iconesMenu" src="./img/iconeLogin.png" width="20px"> Meu Perfil</p></a>
                            <a id="linkMenu" href="#"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/configuracao.png" width="20px"> Configurações</p></a>
                            <a id="linkMenu" href="./php/deslogar.php"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenuSair" src="./img/entrar.png" width="20px"> Sair</p></a>

                            <?php
                            
                            foreach($classeUsuario->retornaPassagensMarcadas() as $arrPassagensMarcadas){
                            
                            ?>

                            <a id="linkMenu" href="<?php echo urlencode($arrPassagensMarcadas["livro1"])."/{$arrPassagensMarcadas["capitulo1"]}/{$arrPassagensMarcadas["versao"]}" ?>"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/marcador.png" width="20px"> <?php echo "{$arrPassagensMarcadas["livro1"]} {$arrPassagensMarcadas["capitulo1"]}" ?></p></a>
                            <a id="linkMenu" href="<?php echo urlencode($arrPassagensMarcadas["livro2"])."/{$arrPassagensMarcadas["capitulo2"]}/{$arrPassagensMarcadas["versao"]}" ?>"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/marcador.png" width="20px"> <?php echo "{$arrPassagensMarcadas["livro2"]} {$arrPassagensMarcadas["capitulo2"]}" ?></p></a>
                            <a id="linkMenu" href="<?php echo urlencode($arrPassagensMarcadas["livro3"])."/{$arrPassagensMarcadas["capitulo3"]}/{$arrPassagensMarcadas["versao"]}" ?>"><p class="pr-3 pl-3"><img id="iconesMenu" src="./img/marcador.png" width="20px"> <?php echo "{$arrPassagensMarcadas["livro3"]} {$arrPassagensMarcadas["capitulo3"]}" ?></p></a>

                            <?php
                            
                            }
                            
                            ?>
                
                        </div>

                    </div>

                    <div class="col">

                        <img id="iconeMenu" class="mt-3 float-right menuPrincipal" src="img/menu.png" width="40px" data-toggle="popover" data-placement="bottom">

                        <!-- Menu principal -->
                        <div id="menuPrincipal-popover" style="display: none">
                        
                            <a id="linkMenu" href=""><p class="border-bottom pb-3 mt-3 pr-3 pl-3"><img id="iconesMenu" src="./img/casa.png" width="20px"> Início</p></a>
                            <a id="linkMenu" href="#blocoNovoTestamento"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/novoTestamento.png" width="20px"> Novo Testamento</p></a>
                            <a id="linkMenu" href="#blocoVelhoTestamento"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/velhoTestamento.png" width="20px"> Velho Testamento</p></a>
                            <a id="linkMenu" href="#blocoVelhoTestamento"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/anotacao.png" width="20px"> Minhas Anotações</p></a>
                            <a id="linkMenu" href="#blocoVelhoTestamento"><p class="border-bottom pb-3 pr-3 pl-3"><img id="iconesMenu" src="./img/marcacao.png" width="20px"> Minhas Marcações</p></a>
                            <a id="linkMenu" href="#blocoVelhoTestamento"><p class="pr-3 pl-3"><img id="iconesMenu" src="./img/historico.png" width="20px"> Histórico</p></a>
                    
                        </div>

                    </div>

                </div>
                
            </div>

        </div>

    </div>

</div>

<img style="cursor: pointer;" id="iconeMarcadorAzul" data-toggle='modal' data-target='.bd-modal-anotacaoRapida-lg' class="shadow" src="img/marcadorAzul.png" width="50px">

<!-- Janela Modal dos comentários que são muitos grandes -->
<div class="modal fade bd-modal-anotacaoRapida-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">

                <img class="mr-2" id="iconeAnotacaorapida" src="img/marcadorAzul.png" width="30px">
                
                Caderno Virtual
                
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">

                    <div class="col">

                    <form>
                        <div class="form-group">
                            <label for="textoAnotacoesRapidas">Anotações Rápidas</label>

                            <?php
                            
                            foreach($classeUsuario->retornaPassagensMarcadas() as $arrAnotacaoRapida){
                            
                            ?>

                            <textarea class="form-control" id="textoAnotacoesRapidas" rows="3" placeholder="Faça anotações rápidas que só você poderá ver, como: lembrar de ler Mateus 5."><?php echo $arrAnotacaoRapida["anotacoesrapidas"]; ?></textarea>

                            <?php
                            
                            }
                            
                            ?>

                        </div>

                        <button id="botaoEnviarAnotacaoRapida" type="button" class="btn btn-outline-primary btn-sm float-right ml-4">Salvar anotação</button>

                        <div id="areaIconeOk">

                            <!-- <img class="float-right mt-1" src="img/ok.png" width="23px"> -->

                        </div>
                        
                    </form>

                    <script type="text/javascript">
                                                                                
                    function salvarAnotacaoRapida (anotacao) {

                        $.ajax({

                            type: "POST",
                            dataType: "html",

                            url: "php/salvar_anotacao_rapida.php",

                            /* beforeSend: function () {

                                $("#loading").html("<img class='imgLoading' src='img/loading.gif'>");

                            }, */

                            data: {anotacao: anotacao},

                            success: function (msg) {

                                $("#areaIconeOk").html(msg);
                                $("#textoAnotacoesRapidas").addClass("is-valid");

                                setTimeout(function() {
                                    $("#areaIconeOk").html("");
                                    $("#textoAnotacoesRapidas").removeClass("is-valid");;
                                }, 3000);

                            }

                        });

                    }

                    $("#botaoEnviarAnotacaoRapida").click(function(){

                        var anotacao = document.getElementById("textoAnotacoesRapidas").value;

                        salvarAnotacaoRapida(anotacao);

                    });

                    </script>

                    </div>

                </div>

                <?php
                
                if(isset($controlePagina) && $controlePagina == "capitulo"){
                
                ?>

                <div class="row">

                    <div class="col">

                        Marcar Passagem<br>
                        <small class="text-muted">Clique em uma posição para marcar a passagem atual</small>

                    </div>

                </div>

                <div class="row bg-light p-3 mt-2">

                    <?php
                            
                        foreach($classeUsuario->retornaPassagensMarcadas() as $arrPassagensMarcadas){
                            
                    ?>

                    <div class="col-6 col-sm-4 text-center">

                        <?php
                        
                        if($arrPassagensMarcadas["livro1"] == urldecode($explode[0]) && $arrPassagensMarcadas["capitulo1"] == $explode[1]){
                        
                        ?>

                        <img src="img/marcador.png"><br>
                        <span class="text-warning" id="nomePassagemMarcador1">(<?php echo "{$arrPassagensMarcadas["livro1"]} {$arrPassagensMarcadas["capitulo1"]}" ?>)</span>

                        <?php
                        
                        }else{
                        
                        ?>

                        <img onclick="window.location='php/salvar_passagem.php?posicao=1&livro=<?php echo $explode[0] ?>&capitulo=<?php echo $explode[1] ?>&versao=<?php echo $explode[2] ?>'" onmouseover="mudarMarcador(1)" onmouseout="voltarMarcador(1)" id="iconeMarcadorBranco1" src="img/marcadorBranco1.png"><br>
                        <span id="nomePassagemMarcador1">(<?php echo "{$arrPassagensMarcadas["livro1"]} {$arrPassagensMarcadas["capitulo1"]}" ?>)</span>

                        <?php
                        
                        }
                        
                        ?>

                    </div>

                    <div class="col-6 col-sm-4 text-center">

                        <?php
                        
                        if($arrPassagensMarcadas["livro2"] == urldecode($explode[0]) && $arrPassagensMarcadas["capitulo2"] == $explode[1]){
                        
                        ?>

                        <img src="img/marcador.png"><br>
                        <span class="text-warning" id="nomePassagemMarcador2">(<?php echo "{$arrPassagensMarcadas["livro2"]} {$arrPassagensMarcadas["capitulo2"]}" ?>)</span>

                        <?php
                        
                        }else{
                        
                        ?>

                        <img onclick="window.location='php/salvar_passagem.php?posicao=2&livro=<?php echo $explode[0] ?>&capitulo=<?php echo $explode[1] ?>&versao=<?php echo $explode[2] ?>'" onmouseover="mudarMarcador(2)" onmouseout="voltarMarcador(2)" id="iconeMarcadorBranco2" src="img/marcadorBranco2.png"><br>
                        <span id="nomePassagemMarcador2">(<?php echo "{$arrPassagensMarcadas["livro2"]} {$arrPassagensMarcadas["capitulo2"]}" ?>)</span>

                        <?php
                        
                        }
                        
                        ?>

                    </div>

                    <div class="col-12 col-sm-4 text-center">

                        <?php
                        
                        if($arrPassagensMarcadas["livro3"] == urldecode($explode[0]) && $arrPassagensMarcadas["capitulo3"] == $explode[1]){
                        
                        ?>

                        <img src="img/marcador.png"><br>
                        <span class="text-warning" id="nomePassagemMarcador3">(<?php echo "{$arrPassagensMarcadas["livro3"]} {$arrPassagensMarcadas["capitulo3"]}" ?>)</span>

                        <?php
                        
                        }else{
                        
                        ?>

                        <img onclick="window.location='php/salvar_passagem.php?posicao=3&livro=<?php echo $explode[0] ?>&capitulo=<?php echo $explode[1] ?>&versao=<?php echo $explode[2] ?>'" onmouseover="mudarMarcador(3)" onmouseout="voltarMarcador(3)" id="iconeMarcadorBranco3" src="img/marcadorBranco3.png"><br>
                        <span id="nomePassagemMarcador3">(<?php echo "{$arrPassagensMarcadas["livro3"]} {$arrPassagensMarcadas["capitulo3"]}" ?>)</span>

                        <?php
                        
                        }
                        
                        ?>

                    </div>

                    <?php
                            
                        }
                            
                    ?>

                    <script>

                        function mudarMarcador(posicao){

                            mark = document.getElementById("iconeMarcadorBranco"+posicao);

                            mark.src="img/marcador.png";
                            $("#nomePassagemMarcador"+posicao).addClass("text-warning");

                        }

                        function voltarMarcador(posicao){

                            mark = document.getElementById("iconeMarcadorBranco"+posicao);

                            mark.src="img/marcadorBranco"+posicao+".png";
                            $("#nomePassagemMarcador"+posicao).removeClass("text-warning");

                        }

                    </script>

                </div>

                <div class="row p-3 mt-2">

                    <div class="col text-center">

                        <small class="text-muted">O Modo Leitura permite você a ler o capítulo atual, sem comentários ou marcação</small><br><br>

                        <?php
                        
                        if(isset($explode[3])){

                        ?>

                        <button onclick="window.location='<?php echo $explode[0].'/'.$explode[1].'/'.$explode[2]; ?>'" type="button" class="btn btn-danger"> <img class="mr-2" src="img/oculos.png" width="35px"> Desativar Modo Leitura</button>
                        
                        <?php
                        
                        }else{

                        ?>

                        <button onclick="window.location='<?php echo $explode[0].'/'.$explode[1].'/'.$explode[2].'/ml'; ?>'" type="button" class="btn btn-primary"> <img class="mr-2" src="img/oculos.png" width="35px"> Ativar Modo Leitura</button>

                        <?php
                        
                        }

                        ?>

                    </div>

                </div>

                <?php
                
                }else{
                
                ?>

                <div class="row">

                <div class="col">

                    Marcar Passagem<br>
                    <small class="text-info">Você precisa estar lendo um capítulo para marcar a passagem</small>

                </div>

                </div>

                <div class="row bg-light p-3 mt-2">

                <?php
                            
                foreach($classeUsuario->retornaPassagensMarcadas() as $arrPassagensMarcadas){
                            
                ?>

                <div class="col-6 col-sm-4 text-center">

                    <img style="opacity: 0.5" src="img/marcadorBranco1.png"><br>
                    <span class="text-muted" id="nomePassagemMarcador1">(<?php echo "{$arrPassagensMarcadas["livro1"]} {$arrPassagensMarcadas["capitulo1"]}" ?>)</span>

                </div>

                <div class="col-6 col-sm-4 text-center">

                    <img style="opacity: 0.5" src="img/marcadorBranco2.png"><br>
                    <span class="text-muted" id="nomePassagemMarcador2">(<?php echo "{$arrPassagensMarcadas["livro2"]} {$arrPassagensMarcadas["capitulo2"]}" ?>)</span>

                </div>

                <div class="col-12 col-sm-4 text-center">

                    <img style="opacity: 0.5" src="img/marcadorBranco3.png"><br>
                    <span class="text-muted" id="nomePassagemMarcador3">(<?php echo "{$arrPassagensMarcadas["livro3"]} {$arrPassagensMarcadas["capitulo3"]}" ?>)</span>

                </div>

                <?php
                            
                }
                            
                ?>

                </div>

                <div class="row p-3 mt-2">

                <div class="col text-center">

                    <small class="text-info">Você precisa estar lendo um capítulo para ativar o Modo Leitura</small><br><br>
                    <button type="button" class="btn btn-primary" disabled> <img class="mr-2" src="img/oculos.png" width="35px"> Ativar Modo Leitura</button>
                    

                </div>

                </div>

                <?php
                
                }
                
                ?>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ver Versículo</button>
            </div> -->
        </div>
    </div>
</div>