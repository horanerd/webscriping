<?php
include "helper.php";

$btc = "https://www.infomoney.com.br/cotacoes/bitcoin-btc/";
$bitcoin = webscript($btc, './/div[@class="value"]');
$array = (explode(" ", $bitcoin));

$ponto = str_replace('.', '', $array[36]);
$virgula = str_replace(',', '.', $ponto);
$cotacao = str_replace('.', ',', $ponto);

echo "<h1> Cotação do Bitcoin é R$ " . $cotacao . "</h1>" . PHP_EOL;
