
<?php

$vet_notas = array(2, 5, 10, 20, 50, 100); //Array que armazena os tipos de notas contidas no terminal.

$vet_quant = array(200, 100, 100, 100, 100, 100); //Array que armazena a quantidade das respectivas notas contidas no terminal.

$vet_indice_inteiro = array(); //Array que armazena os indices de notas($vet_notas) que serão consumidas para a "opção inteiro".

$vet_indice_trocado = array(); //Array que armazena os indices de notas($vet_notas)que serão consumidas para a "opção trocado".

$vet_quant_temp_inteiro = $vet_quant; //Array cópia temporária de $vet_quant.

$vet_quant_temp_trocado = $vet_quant; //Array cópia temporária de $vet_quant.

$vet_quant_notas_trocadas = array(); //Array que armazena a quantidade de notas trocadas que serão consumidas para a "opção trocado".

$vet_soma_quant_notas_trocadas = array(); //Array que armazena a quantidade total de notas consumidas para cada valor de "$vet_indice_trocado[$i]".

$tamanho = 0; //Descrição no código.

$trocado = ""; //Descrição no código.

$soma = 0;

$j = 0;

$i = 0;

$k = 1;

$conte = 1;

$v = ""; //Esta variável receberá uma concatenação da quantidade e valor(2x100) consumidas para cada índice "$vet_indice_inteiro".

$m = 0;

$n = 0;

?>