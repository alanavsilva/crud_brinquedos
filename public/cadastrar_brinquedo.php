<?php

include "../infra/conexao.php";

$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$faixa_etaria = $_POST["faixa_etaria"];
$preco = $_POST["preco"];
$quantidade_estoque = $_POST["quantidade_estoque"];

$sql = "INSERT INTO brinquedos (nome, categoria, faixa_etaria, preco, quantidade_estoque) VALUES ('$nome', '$categoria', '$faixa_etaria', '$preco', '$quantidade_estoque')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
exit;
?>