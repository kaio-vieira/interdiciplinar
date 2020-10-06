<?php
    include 'conecta.php';
    //formato da data atual 2020-08-30
    //Ao clicar para continuar, irá ser feito um insert
    //na tabela nota_fiscal com a data fornecida e o
    //valor total em branco que será atualizado mais a
    //frente
?>

<!DOCTYPE html>
<html>
<head>
    <title>DATA NOTA FISCAL</title>
</head>
 <div align="center">
<body bgcolor="#98FB98">
    <form action="gera_nf.php" method="post">
    <p>INSIRA A DATA DA VENDA</p>
    DATA: <input type="date" name="data">
    <hr>
    <input type="submit" value="CONTINUAR">
    </form>
       </div>
</body>
</html>