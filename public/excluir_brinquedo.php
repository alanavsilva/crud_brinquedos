<?php

include "../infra/conexao.php";

$id = $_GET["id"];

if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("ID do brinquedo inválido.");
}

try {
$sql = "DELETE FROM brinquedos WHERE id = $id";
$comando = $conexao->prepare($sql);
$comando->bind_param("i", $id);
$comando->execute();

header("Location: ../index.php");
exit;

} catch (mysqli_sql_exception $erro) {
    die("Erro ao excluir o brinquedo.");
}