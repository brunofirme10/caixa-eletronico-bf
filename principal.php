<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    //Este formulário é o nucleo do sistema, ele efetua a maioria do processamento.
    $saque = $_POST['valor'];
    include 'vetores.php';
    include 'multiplo.php';
    include 'pega_maior.php';
    if ($saque == "")
        //Autoexplicativo
        {
            echo '<form action=index.php method=POST>
<table border = 2 bgcolor="#66FFFF" SIZE=15
ALIGN=MIDDLE WIDTH=300><tr>
<TD ALIGN=MIDDLE WIDTH=200>
<p>Digite um valor para efetuar o saque!</p>
<p>Clique
em
OK
e
para
reiniciar
a
transa&ccedil&atildeo!</p>
<input
type="submit"
name="OK"
value="OK"
STYLE="color:#FFFFFF; background-color:#FF0000"/>
</tr></td>
</table>
</form>';
            exit;
        }
    if ($saque <= 0)
        //Autoexplicativo
        {
            echo '<form action=index.php method=POST>
<table border = 2 bgcolor="#66FFFF" SIZE=15 ALIGN=MIDDLE
WIDTH=300><tr>
<TD ALIGN=MIDDLE WIDTH=200>
<p>Valor invalido!</p>
<p>Digite um valor valido!</p>
<input
type="submit"
name="OK"
STYLE="color:#FFFFFF; background-color:#FF0000"/>
</tr></td>
</table>

</form>';
            exit;
        }
    if ($saque <= $limite_minimo)
        //Autoexplicativo
        {
            echo '<form action=index.php method=POST>
<table border = 2 bgcolor="#66FFFF" SIZE=15
ALIGN=MIDDLE WIDTH=300><tr>
<TD ALIGN=MIDDLE WIDTH=200>
<p>Valor abaixo do limite minimo!</p>
<p>Digite um novo valor acima do limite minimo!!
</p>
<input
type="submit"
name="OK"
value="OK"
STYLE="color:#FFFFFF; background-color:#FF0000"/>
</tr></td>
</table>
</form>';
            exit;
        }
    verifica_multiplo($vet_notas, $vet_quant, $saque); //Função que verifica se o valordigitado pelo cliente é multiplo das notas armazenadas no terminal.
    while (($saque > $saldo) || ($saque > $limite_diario) || ($saque < $limite_minimo))
        //Este enquanto verifica a validade do valor do saque.
        {
            if ($saque > $limite_diario)
                //Autoexplicativo
                {
                    echo '<form action=index.php method=POST>

<table border = 2 bgcolor="#66FFFF" SIZE=15
ALIGN=MIDDLE WIDTH=300><tr>
<TD ALIGN=MIDDLE WIDTH=200>
<p>Valor acima do limite diario!</p>
<p>Digite um novo valor abaixo do limite diario!
</p>
<input
type="submit"
name="OK"
value="OK"
STYLE="color:#FFFFFF; background-color:#FF0000"/>
</tr></td>
</table>
</form>';
                    exit;
                }
            if ($saque > $saldo)
                //Autoexplicativo
                {
                    echo '<form action=index.php method=POST>
<table border = 2 bgcolor="#66FFFF" SIZE=15
ALIGN=MIDDLE WIDTH=300><tr>
<TD ALIGN=MIDDLE WIDTH=200>
<p>Saldo insuficiente!</p>
<p>Digite um novo valor abaixo do seu saldo!</p>
<input
type="submit"
STYLE="color:#FFFFFF; background-color:#FF0000"/>
</tr></td>
</table>
</form>';
                    exit;
                }
            if ($saque <= $limite_minimo)

                //Autoexplicativo
                {
                    echo '<form action=index.php method=POST>
    <table border = 2 bgcolor="#66FFFF" SIZE=15
    ALIGN=MIDDLE WIDTH=300><tr>
    <TD ALIGN=MIDDLE WIDTH=200>
    <p>Valor abaixo do limite minimo!</p>
    <p>Digite um novo valor acima do limite minimo!!
    </p>
    <input
    type="submit"
    name="OK"
    value="OK"
    STYLE="color:#FFFFFF; background-color:#FF0000"/>
    </tr></td>
    </table>
    </form>';
                    exit;
                }
        }
    $i = 5;
    $vetor_saque = str_split($saque); //Transforma o $saque em um array de
    string .
        $a = sizeof($vetor_saque); //Salva em $a o tamanho de $vetor_saque.
    $a--; //Decrementa o $a.
    $b = $vetor_saque[$a]; //$b recebe o ultimo elemento de $vetor_saque.
    $saque = (int)$saque; //$saque é convertido para inteiro.
    while ($soma != $saque)
        //Este enquanto faz a seleção da quantidade mínima possível de notas para atender ao saque,”Opção inteiro”
        {
            while (($vet_quant_temp_inteiro[$i]) == 0)

                //Este enquanto impede que um saque seja feito em um slot vazio
                {
                    $i--;
                    if (($i < 0))
                        //Este if identifica que as notas acabaram.
                        {
                            //Em uma implementação real, neste ponto rodará um script que solicitará um abastecimento para o respectivo slot.
                            header('Location: invalido3.php');
                            exit;
                        }
                }
            if ((($b == 6) || ($b == 8)) && ($i == 1))
                //Este if impede a dispensação de notas de R$5,00 para saques com valores finalizados com os valores 6 ou 8.
                {
                    $i--;
                }
            $soma = $soma + $vet_notas[$i];
            $vet_quant_temp_inteiro[$i]--;
            $vet_indice_inteiro[$j] = $i;
            $j++;
            if ($soma > $saque)
                //Se o $soma exceder o valor do saque, o valor é devolvido e o processo é reiniciado com $i--
                {
                    $soma = $soma - $vet_notas[$i];
                    $vet_quant_temp_inteiro[$i]++;
                    $i--;

                    $j--;
                }
        }
    for ($i = 0; $i < $j; $i++)
        //Armazena as notas selecionadas para ”Opção inteiro” na variável $v
        {
            if ($sair == true)
                //Este if
                //impede a comparação dos arrays($vet_indice_inteiro[$i]==$vet_indice_inteiro[$k])); //para um $k maior que $j.
                {
                    $valor = $vet_notas[($vet_indice_inteiro[$i])];
                    $v .= " $conte xR$" . $valor;
                    continue;
                }
            if ($vet_indice_inteiro[$i] == $vet_indice_inteiro[$k])
                //Este if contabiliza as ocorrências de um mesmo valor no $vet_indice_inteiro.
                {
                    $conte++;
                } else
                //Este else armazena a quantidade e as notas selecionadas.
                {
                    $valor = $vet_notas[($vet_indice_inteiro[$i])];
                    $v .= " $conte xR$" . $valor;
                    $conte = 1;
                }
            $k++;

            if ($k == $j)
                //Autoexplicativo
                {
                    $sair = true;
                }
        }
    if (sizeof($vet_indice_inteiro) > 50)
        //Este if impede uma dispensação de cédulas superior a 50.
        {
            header('Location: invalido4.php');
            exit;
        }
    //Neste ponto termina a rotina opção inteiro e inicia-se a rotina para da opção
    trocado .
        $cont = 0;
    $conte = 0;
    $tamanho = sizeof($vet_indice_inteiro); //$tamanho recebe quantidade de notasinteiras que serão quebradas em notas trocadas.
    $valida_pega_maior = true; //Variável boleana que valida o resultado da função pega_maior que será chamada abaixo.
    for ($i = 0; $i < $tamanho; $i++)
        // Este for contabiliza a ocorrências de R$100,00 em $vet_indice_inteiro[$i].
        {
            if ($vet_indice_inteiro[$i] == 5) {
                    $cont++;
                }
        }
    $quant_notas_cem = 0;
    if (($cont == 3))
        //Autoexplicativo
        {
            $conte = ($cont / 2);
            $conte--;
            $quant_notas_cem = round($conte);
        }
    if ($cont >= 4)
        //Autoexplicativo
        {
            $conte = ($cont / 2);
            $quant_notas_cem = round($conte);
        }
    for ($i = 0; $i < $tamanho; $i++)
        //Este for faz a seleção das notas para atender ao saque, ”Opção trocado”
        {
            $m = $vet_indice_inteiro[$i];
            $n = pega_maior($vet_quant_temp_trocado, $m); //pega_maior é uma função que seleciona o slot com maior quantidade de notas.
            if (($quant_notas_cem > 0) && ($vet_quant_temp_trocado[5] != 0))
                //Este if inclui algumas notas de R$100 na "opção trocado", afim de balancear a distribuição.
                {

                    $n = 5;
                    $quant_notas_cem--;
                }
            $vet_indice_trocado[$i] = $n;
            $vet_quant_notas_trocadas[$i] = $tabela[$m][$n];
            $vet_quant_temp_trocado[$n] = ($vet_quant_temp_trocado[$n] -
                $vet_quant_notas_trocadas[$i]);
        }
    if ($vet_indice_inteiro == $vet_indice_trocado)
        //Este if impede a exibição na tela de "opção inteiro" e "opção trocado" com os mesmo valores. Como por exemplo em caso de apenas um slot com notas.
        {
            $sao_iguais = true;
        }
    if (array_sum($vet_quant_notas_trocadas) > 50)
        //Este if impede uma dispensação de cédulas superior a 50.
        {
            $excedeu_trocado = true;
        }
    $novo_vet_ind_trocado[0] = -1;
    for ($i = 0; $i < $tamanho; $i++)
        //Este for contabiliza as ocorrências de um mesmo valor no $vet_indice_trocado.
        {
            if (in_array($vet_indice_trocado[$i], $novo_vet_ind_trocado))
                //Este if impede a recontagem de um mesmo valor.
                {
                    continue;
                } else {
                    $j = $i;
                    $j++;
                    $novo_vet_ind_trocado[$j] = $vet_indice_trocado[$i];
                    while ($j < $tamanho)
                        //Este while contabiliza as ocorrências de um mesmo valor no $vet_indice_trocado.
                        {
                            if ($vet_indice_trocado[$i] == $vet_indice_trocado[$j]) {
                                    @$vet_soma_notas_trocadas[($vet_indice_trocado[$i])] = $vet_soma_notas_trocadas[($vet_indice_trocado[$i])] + $vet_quant_notas_trocadas[$j];
                                }
                            $j++;
                        }
                    @$vet_soma_notas_trocadas[($vet_indice_trocado[$i])] = $vet_soma_notas_trocadas[($vet_indice_trocado[$i])] + $vet_quant_notas_trocadas[$i];
                    //O @ impede a exibição de notice.
                }
        }
    for ($i = 5; $i >= 0; $i--)
        //Este for armazena as notas selecionadas para ”Opção trocado” na variável $trocado.
        {
            if (array_key_exists($i, $vet_soma_notas_trocadas)) {
                    $trocado .= " $vet_soma_notas_trocadas[$i] xR$" . $vet_notas[$i];
                }
        }
    if (($saque < 10) || ($valida_pega_maior == false) || (@$sao_iguais == true) || (@$excedeu_trocado == true)
    )
        //Este if verifica as condições onde somente a opção inteiro é exibida na tela.
        {
            echo '<form action="painel.php" method="POST" >
<table
border
=
2
bgcolor="#66FFFF"
SIZE=15 ALIGN=MIDDLE WIDTH=300 ><tr>
<TD ALIGN=MIDDLE WIDTH=200>
<center><br>Saque
de:
R$
' .
                $saque . ',00<br></center>
<center><br>Escolha o conjunto de notas
desejadas dentre as op&ccedil&otildees abaixo:<br></center><br>
<input
type="hidden"
name="valor"
value="' . $saque . '"/>
<input
type="submit" name="executar1"
<input name="Cancelar"
value="' . $v . '"/><br>
<br>
type="submit"
value="Cancelar"
STYLE="color:#FFFFFF;
color:#FF0000"/>
</tr></td>
</table>
</form>';
        } else
        //Este else exibe na tela as opções inteiro e trocado.

        {
            echo '<form action="painel.php" method="POST" >
    <table
    border
    =
    2
    bgcolor="#66FFFF"
    SIZE=15 ALIGN=MIDDLE WIDTH=300 ><tr>
    <TD ALIGN=MIDDLE WIDTH=200>
    <center><br>Saque
    de:
    R$
    ' .
                $saque . ',00<br></center>
    <center><br>Escolha o conjunto de notas
    desejadas dentre as op&ccedil&otildees abaixo:<br></center><br>
    <input
    type="hidden"
    name="valor"
    value="' . $saque . '"/>
    <input type="submit" name="executar1"
    <input type="submit" name="executar2"
    <input name="Cancelar"
    value="' . $v . '"/>
    value="' . $trocado . '"/><br>
    <br>
    type="submit"
    value="Cancelar"
    STYLE="color:#FFFFFF;
    color:#FF0000"/>
    </tr></td>
    </table>
    </form>';
        }
    ?>
</body>

</html>