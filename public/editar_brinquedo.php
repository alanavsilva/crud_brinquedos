<?php

include "../infra/conexao.php";

$id = $_GET["id"] ?? "";

if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("ID do brinquedo inválido.");
}

$sql = "SELECT * FROM brinquedos WHERE id = ?";
$comando = $conexao->prepare($sql);
$comando->bind_param("i", $id);
$comando->execute();

$resultado = $comando->get_result();
$brinquedo = $resultado->fetch_assoc();

if (!$brinquedo) {
    die("Brinquedo não encontrado.");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Brinquedos</title>
    <link rel="stylesheet" href="../style/styles.css">

</head>
<body>
    
        <h1>Gestão de Brinquedos</h1>

        <main>
        <h2>Editando o brinquedo <?php echo $brinquedo["nome"]; ?>!</h2>

        <form action="atualizar.php" method="POST">
            <input
                type="hidden"
                name="id"
                value="<?php echo $brinquedo["id"]; ?>"
            >

            <label for="nome">Nome:</label>
            <input
                type="text"
                name="nome"
                value="<?php echo $brinquedo["nome"]; ?>"
                required
            >
            <br>

            <label for="categoria">Categoria:</label>
            <input
                type="text"
                name="categoria"
                value="<?php echo $brinquedo["categoria"]; ?>"
                required
            >
            <br>

            <label for="faixa_etaria">Faixa etária:</label>
            <input
                type="text"
                name="faixa_etaria"
                value="<?php echo $brinquedo["faixa_etaria"]; ?>"
                required
            >
            <br>

            <label for="preco">Preço:</label>
            <input
                type="number"
                name="preco"
                min="0"
                step="0.01"
                value="<?php echo $brinquedo["preco"]; ?>"
                required
            >
            <br>

            <label for="quantidade_estoque">Quantidade em estoque:</label>
            <input
                type="number"
                name="quantidade_estoque"
                min="0"
                value="<?php echo $brinquedo["quantidade_estoque"]; ?>"
                required
            >
            <br>

            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
    </footer>
</body>

</html>