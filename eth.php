<?php
include "helper.php";
/* Cotação Ethereum */
$eth = "https://www.infomoney.com.br/cotacoes/ethereum-eth/";
$ethereum = webscript($eth, './/div[@class="value"]');
$array = (explode(" ", $ethereum));

$ponto = str_replace('.', '', $array[36]);
$virgula = str_replace(',', '.', $ponto);
$cotacao = str_replace('.', ',', $ponto);
echo "<h1>Cotação do Ethereum é R$ " . $cotacao . "</h1>"  . PHP_EOL;

echo "<h2> Quantos Ethereum você tem ? </h2>";

echo "<input type='text' name='eth' > ";
echo "<input type='hidden' name='cotacao' value='{$cotacao}' > ";
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