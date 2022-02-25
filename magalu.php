<?php
include "helper.php";

$mglu = "https://www.infomoney.com.br/cotacoes/magazine-luiza-mglu3";
$magalu = webscript($mglu, './/div[@class="value"]');
$array = (explode(" ", $magalu));

$ponto = str_replace('.', '', $array[36]);
$virgula = str_replace(',', '.', $ponto);
$cotacao = str_replace('.', ',', $ponto);

echo "<h1> a cotação de magalu é R$ " . $cotacao . "</h1>" . PHP_EOL;
