<?php

include "../classes/capitulo.class.php";
$classeCapitulo = new Capitulo();

$pg = $_POST["pg"];
$busca = $_POST["busca"];

?>

<div>

<?php

$somaPg = $pg * 20;

foreach ($classeCapitulo->buscaVerso($somaPg, 20, $busca) as $arrBusca){

?>

<p class="border-bottom pb-4">

    <b><?php echo $arrBusca["liv_nome"]; ?> <?php echo $arrBusca["ver_capitulo"]; ?>:<?php echo $arrBusca["ver_versiculo"]; ?></b> - <?php echo $arrBusca["ver_texto"]; ?>

</p>

<?php

}
                
?>

</div>

<script>

$("#botaoMostrar").css("display", "none");
$("#issoETudo").removeClass("d-none");
    
</script>