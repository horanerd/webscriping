<?php
function webscript($site, $path)
{
    libxml_use_internal_errors(true);
    $conteudo = file_get_contents($site);
    $documento = new DOMDocument();
    $documento->loadHTML($conteudo);

    $xPath = new DOMXPath($documento);
    $domNodeList = $xPath->query($path);

    foreach ($domNodeList as $elemento);
    return  $elemento->textContent;
}
