<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    function verifica_multiplo($notas, $quant_notas, &$valor_saque)
    //Função que verifica se o valor digitado pelo cliente é multiplo das notas armazenadas no terminal.
    {
        $multiplo = false;
        while ($multiplo == false) {
                for ($i = 0; $i <= 5; $i++) {
                        if (($valor_saque % $notas[$i] == 0) && ($quant_notas[$i] != 0)) {
                                $multiplo = true;
                                break;
                            }
                    }
                if ($multiplo == false) {
                        echo '<form action=index.php method=POST>
<table border = 2 bgcolor="#66FFFF" SIZE=15 ALIGN=MIDDLE WIDTH=300><tr>
<TD ALIGN=MIDDLE WIDTH=200>
<p>Valor digitado n&atildeo e multiplo das notas armazenadas neste terminal!</p>
<p>Clique em OK e digite um valor multiplo das notas disponivies!</p>
<input type="submit" name="OK" value="OK"
STYLE="color:#FFFFFF; background-color:#FF0000"/>
</tr></td>
</table>
</form>';
                        //exit;
                        exit;
                    }
            }
    }
    ?>
</body>

</html>