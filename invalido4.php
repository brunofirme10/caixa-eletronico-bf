<?php
//Este formulário será exibido, caso a quantidade de cédulas exceda o limite máximo dispensação! .
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <form action=index.php method=POST>
        <table BORDER=2 BGCOLOR="#66FFFF" SIZE=15 ALIGN=MIDDLE WIDTH=300>
            <tr>
                <TD ALIGN=MIDDLE WIDTH=200>
                    <br>Saque excedeu o limite máximo de cédulas que podem
                    ser dispensadas!
                    <p>Dirija-se a outro terminal ou digite um valor inferior!</p>
                    <input type="submit" name="OK" STYLE="color:#FFFFFF; background-color:#FF0000" />
            </tr>
            </td>
        </table>
    </form>

</body>

</html>