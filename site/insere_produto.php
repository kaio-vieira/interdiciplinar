<?php 
    session_start();
    include 'conecta.php';
    
    $nome = $_POST['nomeP'];
    $preco = $_POST['precoP'];
	

	$consulta = $conexao -> prepare(" INSERT INTO produtos (nome,preco) VALUES ('$nome','$preco')");

	$consulta -> execute();

	header('Location: index.php');
