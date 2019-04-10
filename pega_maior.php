<?php
function pega_maior($quant_notas, $m)
{
    global $valida_pega_maior;
    $inicio = 0;
    $fim = 0;
    $maior = 0;
    $valor = 0;

    if ($m == 5) {
            $inicio = 2;
            $fim = 4;
            $valor = $quant_notas[$inicio];
        }
    if ($m == 4) {
            $inicio = 1;
            $fim = 2;
            $valor = $quant_notas[$inicio];
        }
    if ($m == 3) {
            $inicio = 0;
            $fim = 3;
            $valor = $quant_notas[$inicio];
        }
    if ($m == 2) {
            $inicio = 0;
            $fim = 2;
            $valor = $quant_notas[$inicio];
        }
    if ($m == 1) {

            $inicio = 1;
            $fim = 1;
            $valor = $quant_notas[$inicio];
        }
    if ($m == 0) {
            $inicio = 0;
            $fim = 0;
            $valor = $quant_notas[$inicio];
        }
    if (($quant_notas[$i]) >= ($valor)) {
            $maior = $i;
            $valor = $quant_notas[$i];
        }
}
//Este if impede que a opção trocado seja exibida na tela, se o slot selecionado pelo algoritmo, estiver vazio.
if ($quant_notas[$maior] == 0) {
        $valida_pega_maior = false;
    }
return $maior;
}
