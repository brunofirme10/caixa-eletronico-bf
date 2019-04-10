<?php
include 'vetores.php';
if (isset($_POST['executar1']))
    //Este if recebe dados de principal.php. Se o cliente cliquar na opção inteiro a variáve  matriz $vet_quant é atualizada com $vet_quant_temp_in      teiro. 
    {
        $vet_quant = $vet_quant_temp_inteiro;
        echo '<form action=index.php method=POST>
<table
border
=
2
bgcolor="#66FFFF"
SIZE=15
ALIGN=MIDDLE WIDTH=300><tr>
<TD ALIGN=MIDDLE WIDTH=200>
<p>Saque opção inteiro realizado com sucesso!</p>
<p>Retire as notas no dispensador!</p>
<p>Clique em OK e para finalizar a transação!</p>
<input
type="submit"
name="OK"
value="OK"
STYLE="color:#FFFFFF; background-color:#FF0000"/>
</tr></td>
</table>
</form>';
    }
if (isset($_POST['executar2']))
    //Este if recebe dados de principal.php. Se o cliente cliquar na opção trocado a variável matriz $vet_quant é atualizada com $vet_q uan t_t e m p _ tr o cad o . 
    {
        $vet_quant = $vet_quant_temp_trocado;
    }
echo '<form action=index.php method=POST>
        <table border=2 bgcolor="#66FFFF"
SIZE=15
ALIGN=MIDDLE WIDTH=300><tr>
<TD ALIGN=MIDDLE WIDTH=200>
<p>Saque opção trocado realizado com sucesso!</p>
<p>Retire as notas no dispensador!</p>
<p>Clique em OK e para finalizar a transação!</p>
<input
type="submit"
name="OK"
value="OK"
STYLE="color:#FFFFFF; background-color:#FF0000"/>
</tr></td>
</table>
</form>';

if (isset($_POST['Cancelar']))
    //Este if recebe dados de principal.php, opção cancelar.
    {
        echo '<form action=index.php method=POST>
<table
border
=
2
bgcolor="#66FFFF"
SIZE=15
ALIGN=MIDDLE WIDTH=300><tr>
<TD ALIGN=MIDDLE WIDTH=200>
<p>Operação Cancelada!</p>
<p>Clique em OK e para reiniciar a transação!</p>
<input
type="submit"
name="OK"
value="OK"
STYLE="color:#FFFFFF; background-color:#FF0000"/>
</tr></td>
</table>
</form>';
    }
if (isset($_POST['Continuar']))
    //Este if recebe dados de concluir.php, se o tecnico de suporte cliquar em "continuar" será direcionado para notas.php.

    {
        header('Location: notas.php');
        exit;
    }
if (isset($_POST['Sair']))
    //Este if recebe dados de concluir.php, se o tecnico de suporte cliquar em "sair "  se r d ire c ion a do para index .php  libe rando  o ter minal  para uso dos clientes. 
    {
        header('Location: index.php');
        exit;
    }
