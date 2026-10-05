<?php

include "../infra/conexao.php";

$nome =  trim($_POST["nome"] ?? "");
$categoria = trim($_POST["categoria"] ?? "");
$faixa_etaria = trim($_POST["faixa_etaria"] ?? "");
$preco = trim($_POST["preco"] ?? "");
$quantidade_estoque = trim($_POST["quantidade_estoque"] ?? "");

if ($nome == "" || $categoria == "" || $faixa_etaria == "" || !is_numeric($preco) || filter_var($quantidade, FILTER_VALIDATE_INT) === false) {
    die("Preencha os dados corretamente.");
}

try {
$sql = "INSERT INTO brinquedos (nome, categoria, faixa_etaria, preco, quantidade_estoque) VALUES (?, ?, ?, ?, ?)";

$comando = $conexao->prepare($sql);
$comando->bind_param("sssdi", $nome, $categoria, $faixa_etaria, $preco, $quantidade);
$comando->execute();

header("Location: ../index.php");
exit;

} catch (mysqli_sql_exception $erro) {
    die("Erro ao cadastrar o brinquedo.");
}
?>