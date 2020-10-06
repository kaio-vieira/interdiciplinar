<?php
    include 'conecta.php';
    echo "<br>";
    session_start();
    $nf = $_SESSION['nf'];
    $id_produto = $_POST['id_prod'];
    $qtde = $_POST['qtde']; 
    $subtotal = $_POST['subtotal'];

    //MOSTRA O ÍTEM SELECIONADO E INSERE NA TABELA ITENS NF
    //NA SEQUENCIA PEDE CONFIRMAÇÃO SE DESEJA INSERIR MAIS ITENS

    echo "NF -> " . $nf . "<br>";
    echo "ID_PRODUTO -> " . $id_produto . "<br>";
    echo "QTDE -> " . $qtde . "<br>";
    echo "SUBTOTAL -> " . $subtotal . "<br>";

    $consulta = $conexao -> prepare(
        "INSERT INTO itens_nf (cod_produto,num_nf,qtde,subtotal)
        VALUES ('$id_produto', '$nf', '$qtde', '$subtotal')");
    $consulta -> execute();
    header('Location: confirma_item.php');
?>