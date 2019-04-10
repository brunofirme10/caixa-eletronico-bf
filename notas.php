<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    include 'vetores.php';
    ?>
    <form action="abastecimento.php" method="POST">
        <table BORDER=2 BGCOLOR="#66FFFF" SIZE=15 ALIGN=MIDDLE WIDTH=300>
            <tr>
                <TD ALIGN=MIDDLE WIDTH=200>

            <tr><br>Selecione uma das notas dentre as op&ccedil&otildees abaixo para abastecer:<br></tr><br>
            <input type="submit" name="executar0" value="R$2,00" />
            <input type="submit" name="executar1" value="R$5,00" />
            <input type="submit" name="executar2" value="R$10,00" />
            <input type="submit" name="executar3" value="R$20,00" /><br><br>
            <input type="submit" name="executar4" value="R$50,00" />
            <input type="submit" name="executar5" value="R$100,00" /><br><br>

            <input type="submit" value="Cancelar" STYLE="color:#FFFFFF;
name=" Cancelar" background- color:#FF0000" />
            </tr>
            </td>
        </table>
    </form>
</body>

</html>