<?php
libxml_use_internal_errors(true);

$mglu = "https://www.infomoney.com.br/cotacoes/magazine-luiza-mglu3";
$btc = "https://www.infomoney.com.br/cotacoes/bitcoin-btc/";

$conteudo = file_get_contents($btc);
$documento = new DOMDocument();
$documento->loadHTML($conteudo);

$xPath = new DOMXPath($documento);
$domNodeList = $xPath->query('.//div[@class="value"]');

/** @var DOMNode $elemento */


foreach ($domNodeList as $elemento);
echo "<h1> Cotação do Bitcoin é" . $elemento->textContent . "</h1>" . PHP_EOL;
