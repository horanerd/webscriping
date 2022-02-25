<?php
include "helper.php";

/* Cotação dolar */
$real = webscript("https://br.investing.com/currencies/usd-brl", './/span[@data-test="instrument-price-last"]');
$real = str_replace(",", ".", $real);
$real = (float)$real;

echo "<h1> Cotação do Dolar é R$ " . number_format($real, 2, ',', '.') . "</h1>" . PHP_EOL;

/* Cotação Bitcoin */
$btc = "https://www.infomoney.com.br/cotacoes/bitcoin-btc/";
$bitcoin = webscript($btc, './/div[@class="value"]');
$array = (explode(" ", $bitcoin));

$ponto = str_replace('.', '', $array[36]);
$virgula = str_replace(',', '.', $ponto);
$cotacao = str_replace('.', ',', $ponto);
$cotacao = (float)$cotacao;
$cotacao = number_format($cotacao, 2, ',', '.');

echo "<h1> Cotação do Bitcoin é R$ " . $cotacao . "</h1>" . PHP_EOL;

/* Cotação Ethereum */
$eth = "https://www.infomoney.com.br/cotacoes/ethereum-eth/";
$ethereum = webscript($eth, './/div[@class="value"]');
$array = (explode(" ", $ethereum));

$ponto = str_replace('.', '', $array[36]);
$virgula = str_replace(',', '.', $ponto);
$cotacao = str_replace('.', ',', $ponto);
$cotacao = (float)$cotacao;
$cotacao = number_format($cotacao, 2, ',', '.');
echo "<h1>Cotação do Ethereum é R$ " . $cotacao . "</h1>"  . PHP_EOL;

/* Minha carteira */

$carteira = "https://polygonscan.com/address/0x9210e2054bf32b19d275d139e2cb9dcb467ec434";
$poligon = webscript($carteira, './/div[@id="ContentPlaceHolder1_divSummary"]//div[@class="card-body"]//div[@id="ContentPlaceHolder1_tokenbalance"]//a[@id="availableBalanceDropdown"]');

$array = str_replace("1", "", $poligon);
$dolar = str_replace("$", "", $array);
$dolar = (float)$dolar;
$dolar = $dolar * $real;
$dolar = number_format($dolar, 2, ',', '.');
echo "<h1>Cotação minha carteira  R$ " . $dolar . " </h1>" . PHP_EOL;
