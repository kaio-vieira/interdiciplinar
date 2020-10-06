<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body bgcolor="#98FB98">
    <div align="center">
    <?php
    include 'conecta.php';
    echo "<br><hr>";
    session_start();
    $nf = $_SESSION['nf'];
    
    $consulta = "SELECT * FROM itens_nf WHERE num_nf = '$nf'";

    echo "<h1>NF: ".$nf . "</h1><br><hr>";
    $total = 0;
    foreach ($conexao -> query($consulta) as $linha) {

        echo "Cod Produto: ".$linha['cod_produto'] ."<br>";
        //echo "Nome Produto: ".$linha['idade'] ."<br>";
        echo "Qtde: ".$linha['qtde'] ."<br>";
        echo "Subtotal: ".$linha['subtotal'] ."<br>";
        $total = $total + $linha['subtotal'];
        echo "<hr>";
    }

    echo "<b>TOTAL DA NOTA R$ ".$total."</b><hr>";
    ?>

    <p>O QUE DESEJA FAZER?</p>
    <p><a href="seleciona_ultima_nf.php">INSERIR OUTRO PRODUTO</a></p>
    <p><a href="finalizar.php?total=<?php echo $total; ?>">FINALIZAR NOTA FISCAL</a>   </p>   
    </div>

</body>
</html>