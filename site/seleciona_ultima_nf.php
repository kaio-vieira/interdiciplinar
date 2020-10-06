<?php
    include 'conecta.php';
    echo "<br><hr>";
    //CONSULTA PARA SELECIONAR A ÚLTIMA NOTA FISCAL,
    //A MAIS RECENTE (AQUELA QUE INICIOU O SISTEMA)
    $consulta = "SELECT MAX(nf) as ultima FROM nota_fiscal";
    $consulta = $conexao->query($consulta);
    $linha = $consulta->fetch_assoc();
    $ultimo = $linha['ultima'];
    echo "Nota Fiscal: ".$ultimo."<br>";
    echo "<hr>";
    //SERIA INTERESSANTE CRIAR UMA VARIAVEL DE SESSÃO
    //NESTE PONTO PARA PODER ADICIONAR VÁRIOS PRODUTOS 
    //À ESSA MESMA NOTA FISCAL!
    session_start();
    $_SESSION['nf'] = $ultimo;
?>
<!DOCTYPE <html>
<head>
<html>
    <title></title>
</head>
<body bgcolor="#98FB98">
     <div align="center">
    <!--
    REPARE QUE O ACTION DO FORMULÁRIO VAI ENVIAR POR GET O NUMERO DA REPARE QUE O ACTION DO FORMULÁRIO VAI ENVIAR POR GET O NUMERO DA ÚLTIMA NOTA FISCAL PARA A PRÓXIMA PÁGINA E POR POST O ID DO PRODUTO E A QUANTIDADE
    -->

    <form action="insere_item.php?nf='<?php echo $ultimo; ?>'" method="post">
        NF: <input type="text" name="nf" value="<?php echo $ultimo;?>">
        <br>
        <p>
            Produto:
            <select name="produto_opcao" id="produto_opcao">
            <?php
                //CRIA UM SELECT COM TODOS OS PRODUTOS PARA O USUÁRIO
                //ESCOLHER UM
                $consulta = "SELECT * FROM produtos";
                foreach ($conexao -> query($consulta) as $linha) {
            ?>
                    <option value="<?php echo $linha['id'];?>"><?php echo $linha['nome'];?></option>
        
            <?php 
                }
            ?>
            </select>
        </p>
        <p>
        Qtde: <input type="text" name="qtde">
        </p>
        <hr>
        <input type="submit" value="ADICIONAR">
    </form>
       </div>
</body>
</html>