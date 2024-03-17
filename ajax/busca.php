<?php

include "../classes/capitulo.class.php";
$classeCapitulo = new Capitulo();

$pg = $_POST["pg"];
$busca = $_POST["busca"];

?>

<?php

$somaPg = $pg * 20;

if($classeCapitulo->buscaVerso($somaPg, 20, $busca) == false){

?>

    <div>

        <p class="mt-5 text-center text-secondary">

            Isso é tudo!

        </p>

    </div>

    <script>

        $("#btnMais").css("display", "none");
        
    </script>

<?php

}else{


foreach ($classeCapitulo->buscaVerso($somaPg, 20, $busca)[0] as $arrBusca){

?>

<div>

    <p class="border-bottom pb-4">

        <b><?php echo $arrBusca["liv_nome"]; ?> <?php echo $arrBusca["ver_capitulo"]; ?>:<?php echo $arrBusca["ver_versiculo"]; ?></b> - <?php echo $arrBusca["ver_texto"]; ?>

    </p>

</div>

<?php

}

}
                
?>