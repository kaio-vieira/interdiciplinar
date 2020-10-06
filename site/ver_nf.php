<?php
    include 'conecta.php';

    $consulta = "SELECT * FROM nota_fiscal";

    foreach ($conexao -> query ($consulta) as $linha) {
        echo "NF: ".$linha['nf'] ."<br>";
        echo "Data: ".$linha['data'] ."<br>";
        echo "Valor Total R$ : ".$linha['valor total'] ."<br>";

        $nota = $linha['nf'];
        $consulta2 = "SELECT * FROM itens_nf WHERE num_nf = '$nota'";
        foreach ($conexao -> query($consulta2) as $linha2) {
            echo "ID: ".$linha2['id']." - ";
            echo "CodProduto: ".$linha2['cod_produto'] ." - ";
            $codigo = $linha2['cod_produto'];
            $consulta3 = "SELECT * FROM produtos WHERE id = '$codigo'";
            foreach ($conexao -> query($consulta3) as $linha3) {
                echo "Nome: ".$linha3['nome'] ." - ";
                echo "Valor Unit R$: ".$linha3['preco'] ." - ";
            }

            echo "Qtde: ".$linha2['qtde'] ." - ";
            echo "Sub Total R$ : ".$linha2['subtotal'] ."<br>";

        } 
        echo "<hr>";
    } 
    echo "<br>";
?>
<p><a href="index.php">VOLTAR INICIO</a></p>