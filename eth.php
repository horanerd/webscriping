<?php
libxml_use_internal_errors(true);

$mglu = "https://www.infomoney.com.br/cotacoes/magazine-luiza-mglu3";
$btc = "https://www.infomoney.com.br/cotacoes/bitcoin-btc/";
$eth = "https://www.infomoney.com.br/cotacoes/ethereum-eth/";

$conteudo = file_get_contents($eth);
$documento = new DOMDocument();
$documento->loadHTML($conteudo);

$xPath = new DOMXPath($documento);
$domNodeList = $xPath->query('.//div[@class="value"]');

/** @var DOMNode $elemento */


foreach ($domNodeList as $elemento) {

    $array = (explode(" ", $elemento->textContent));

    $ponto = str_replace('.', '', $array[36]);
    $virgula = str_replace(',', '.', $ponto);
    $cotacao = str_replace('.', ',', $ponto);
    echo "<h1>Cotação do Ethereum é R$ " . $cotacao . "</h1>"  . PHP_EOL;
    echo "<input type='hidden' name='cotacao' value=' {$virgula} ' >";
}

echo "<h2> Quantos Ethereum você tem ? </h2>";

echo "<input type='text' name='eth' > ";
echo "<p class=resultado> Resultado </p>";
?>

<script>
    var eth = document.querySelector("input[name=eth]");
    var cotacao = document.querySelector("input[name=cotacao]");
    var campoResultado = document.querySelector(".resultado");

    function calcular(eth, cotacao) {
        var valor1 = parseFloat(eth.value) || 0;
        var valor2 = parseFloat(cotacao.value) || 0;
        return valor1 * valor2;
    }

    function evtCalcular() {
        var resultado = calcular(eth, cotacao);

        campoResultado.innerHTML = resultado;
    }
    eth.addEventListener('blur', evtCalcular);
</script>