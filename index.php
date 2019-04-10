<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <form action="principal.php" method="POST">
        <table BORDER=2 BGCOLOR="#66FFFF" SIZE=15 ALIGN=MIDDLE WIDTH=300>
            <tr>
                <TD ALIGN=MIDDLE WIDTH=200>
            <tr><br>Op&ccedil&atildeo Saque:<br></tr>
            <tr><br>Notas Dispon&iacuteveis:</tr>
            <?php
            //Este formulário é a tela inicial do sistema. Nele o cliente irá digitar o valor do saque que deseja.
            $vazio = true;
            $cont = 0;
            include 'vetores.php';
            for ($i = 0; $i <= 5; $i++)
                //Verifica e exibe na tela quais os slots podem fornecer cédulas(notas disponiveis)
                {
                    if (($vet_quant[$i]) != 0) {
                            $vet_nota_disponivel[$i] = $i;
                            echo " R$", $vet_notas[$vet_nota_disponivel[$i]];
                            $vazio = false;
                        }
                }
            if ($vazio == false)
                //Este if omite os botões confirmar e cancela, no caso de terminal vazio.
                {
                $a = '<br></center>
                        <br>valor <input type="text" name="valor"/><br>
                            <center><br> <input name="Cancelar" type="submit" value="Cancelar"
                                STYLE="color:#FFFFFF; background-color:#FF0000"/>
                                <input type="submit" name="Confirmar" value="Confirmar"
                                    STYLE="color:#FFFFFF; background-color:#006400"/></center>          
                        </form>';
            echo $a;
            exit;
                }
            for ($i = 0; $i <= 5; $i++)
                //Verifica se todos os slots estão vazios(notas disponiveis=vazio)
                {
                    if (empty($vet_quant[$i])) {
                            $cont++;
                            //Em uma implementação real, neste ponto rodará um script que solicitará um abastecimento para o respectivo slot.
                        }
                    if ($cont == 5) {
                            echo "Terminal vazio!";
                            echo "<p>Dirija-se a outro terminal!</p>";
                        }
                }
            ?>
            </tr>
            </td>
        </table>
</body>

</html>