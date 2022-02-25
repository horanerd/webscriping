<?php
include "helper.php";

/* Cotação dolar */
$real = webscript("https://br.investing.com/currencies/usd-brl", './/span[@data-test="instrument-price-last"]');
$real = str_replace(",", ".", $real);
$real = (float)$real;

echo "<h1> Cotação do dolar é R$ " . number_format($real, 2, ',', ' ') . "</h1>" . PHP_EOL;
