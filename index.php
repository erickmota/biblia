<?php

if(isset($_GET["url"])){

    $explode = explode("/", $_GET["url"]);

    /* Verificando se é uma página que mostra o texto do capítulo */
    if(isset($explode[0]) && isset($explode[1]) && isset($explode[2]) && !isset($explode[3])){

        include "paginas/capitulo.php";

    /* Página dos números do capítulo */
    }else if(isset($explode[0]) && isset($explode[1]) && !isset($explode[2]) && !isset($explode[3])){

        if($explode[0] == "busca"){

            include "paginas/busca.php";
    
        }else{

            include "paginas/numero_capitulo.php";

        }


    /* Um explode na URL apenas */
    }else if(isset($explode[0]) && isset($explode[1]) && isset($explode[2]) && isset($explode[3])){

        include "paginas/capitulo.php";

    }

}else{

    include "paginas/home.php";

}

?>