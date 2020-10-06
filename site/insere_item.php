<!DOCTYPE html>
<html>
<head>
    <title>ITEM DA NOTA FISCAL</title>
</head>
<body bgcolor="#98FB98">
     <div align="center">
<?php
    include 'conecta.php';
    echo "<br>";

    //ESSE ARQUIVO DEVE PEGAR CADA PRODUTO SELECIONADO
    //CALCULAR O SUBTOTAL DE CADA ITEM E ADICIONAR A
    //TABELA ITENS_NF

    session_start();
    $nf = $_SESSION['nf'];
    echo "<b>Numero da NF: " . $nf . "</b><br>";
    $id_prod = $_POST['produto_opcao'];
    $qtde_prod = $_POST['qtde'];

    //echo "Cód Produto: ".$id_prod."<br>";
    //echo "Qtde: ".$qtde_prod."<br>";
    
    //echo "PRECISA CALCULAR SUBTOTAL DESTE PRODUTO!<br>";

    $consulta = "SELECT preco, nome FROM produtos WHERE id='$id_prod'";
    $consulta = $conexao->query($consulta);
    $linha = $consulta->fetch_assoc();
    print_r($linha);
    $preço = $linha['preco'];
    $nome = $linha['nome'];

    //echo "Valor Unitário: R$ " .$preco."<br>";
    //FAZ O CÁLCULO DO SUBTOTAL DO PRODUTO SELECIONADO
    $subtotal = $preco * $qtde_prod;

    //echo "Subtotal: R$ ".$subtotal."<br>";
?>

<form action="insere_item_nf.php" method="POST">
    <p>
        ID PRODUTO: <input type="text" name="id_prod" value="<?php echo $id_prod; ?>" readonly="readonly">
    </p>
    <p>
        PRODUTO: <input type="text" name="nome_prod" value="<?php echo $nome; ?>" readonly="readonly">
    </p>
    <p>
        VALOR UNIT: <input type="text" name="valor_unit" value="<?php echo $preco; ?>" readonly="readonly">
    </p>
    <p>
        QTDE: <input type="text" name="qtde" value="<?php echo $qtde_prod; ?>" readonly="readonly">
    </p>
    <p>
        SUBTOTAL: <input type="text" name="subtotal" value="<?php echo $subtotal; ?>" readonly="readonly">
    </p>

    <input type="submit" value="ADICIONAR PRODUTO">
   </div>
</form>
</body>
</html>