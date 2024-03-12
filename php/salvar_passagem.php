<?php

include '../classes/capitulo.class.php';
$classeCapitulo = new Capitulo();

$posicao = $_GET["posicao"];
$livro = $_GET["livro"];
$capitulo = $_GET["capitulo"];
$versao = $_GET["versao"];

$classeCapitulo->livro = $livro;
$classeCapitulo->capitulo = $capitulo;

$classeCapitulo->salvarPassagem($posicao);

?>

<script>

window.alert("Passagem marcada com sucesso!");
window.location="../<?php echo urlencode($livro) ?>/<?php echo $capitulo ?>/<?php echo $versao ?>";

</script>