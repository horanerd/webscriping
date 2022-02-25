<?php
include "helper.php";

/* Cotação dolar */
$real = webscript("https://br.investing.com/currencies/usd-brl", './/span[@data-test="instrument-price-last"]');
$real = str_replace(",", ".", $real);
$real = (float)$real;

/* Rede Poligon */
$carteira = "https://polygonscan.com/address/0x9210e2054bf32b19d275d139e2cb9dcb467ec434";
$poligon = webscript($carteira, './/div[@id="ContentPlaceHolder1_divSummary"]//div[@class="card-body"]//div[@id="ContentPlaceHolder1_tokenbalance"]//a[@id="availableBalanceDropdown"]');

/* Rede extrair poligon */
$array = str_replace("1", "", $poligon);
$dolar = str_replace("$", "", $array);
$dolar = (float)$dolar;
$dolar = $dolar * $real;
$dolar = number_format($dolar, 2, ',', ' ');
echo "<h1>Sua Carteira tem  R$ " . $dolar . " </h1>" . PHP_EOL;
