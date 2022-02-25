<?php
libxml_use_internal_errors(true);
$dolar = "https://br.investing.com/currencies/usd-brl";

$conteudo = file_get_contents($dolar);
$documento = new DOMDocument();
$documento->loadHTML($conteudo);

$xPath = new DOMXPath($documento);
$domNodeList = $xPath->query('.//span[@data-test="instrument-price-last"]');

/** @var DOMNode $elemento */


foreach ($domNodeList as $elemento) :
    $real = str_replace(",", ".", $elemento->textContent);
    $real = (float)$real;
    echo "<h1> Cotação do dolar é " . number_format($real, 2, ',', ' ') . "</h1>" . PHP_EOL;
endforeach;
