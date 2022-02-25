<?php
include "helper.php";
libxml_use_internal_errors(true);

$carteira = "https://polygonscan.com/address/0x9210e2054bf32b19d275d139e2cb9dcb467ec434";

$conteudo = file_get_contents($carteira);
$documento = new DOMDocument();
$documento->loadHTML($conteudo);

$xPath = new DOMXPath($documento);
$domNodeList = $xPath->query('.//div[@id="ContentPlaceHolder1_divSummary"]//div[@class="card-body"]//div[@id="ContentPlaceHolder1_tokenbalance"]//a[@id="availableBalanceDropdown"]');

/** @var DOMNode $elemento */

$real = webscript("https://br.investing.com/currencies/usd-brl", './/span[@data-test="instrument-price-last"]');
$real = str_replace(",", ".", $real);
$real = (float)$real;
//$real = number_format($dolar, 2, ',', ' ');

foreach ($domNodeList as $elemento);
$array = str_replace("1", "", $elemento->textContent);
$dolar = str_replace("$", "", $array);
$dolar = (float)$dolar;
$dolar = $dolar * $real;
$dolar = number_format($dolar, 2, ',', ' ');
echo "<h1>Sua Carteira tem  R$ " . $dolar . " </h1>" . PHP_EOL;
