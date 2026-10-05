<?php

include "infra/conexao.php";

$sql = "SELECT * FROM brinquedos";
$comando = $conexao->prepare($sql);
$comando->execute();
$brinquedos = $comando->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Brinquedos</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    
<h1>Gestão de Brinquedos</h1>

<main>
    <h2>Brinquedos cadastrados</h2>
    
   <form action="public/cadastrar_brinquedo.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
            <br>

            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" required>
            <br>

            <label for="faixa_etaria">Faixa etária:</label>
            <input type="text" name="faixa_etaria" required>
            <br>

            <label for="preco">Preço:</label>
            <input type="number" name="preco" min="0" step="0.01" required>
            <br>

            <label for="quantidade_estoque">Quantidade em estoque:</label>
            <input type="number" name="quantidade_estoque" min="0" required>
            <br>

            <button type="submit">Cadastrar</button>
        </form>

         <div>
            <h2>Brinquedos cadastrados</h2>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Faixa etária</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
            <?php while ($brinquedo = $brinquedos->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $brinquedo["id"]; ?></td>
                        <td><?php echo $brinquedo["nome"]; ?></td>
                        <td><?php echo $brinquedo["categoria"]; ?></td>
                        <td><?php echo $brinquedo["faixa_etaria"]; ?></td>
                        <td><?php echo $brinquedo["preco"]; ?></td>
                        <td><?php echo $brinquedo["quantidade_estoque"]; ?></td>
                        <td>
                            <a href="public/editar_brinquedo.php?id=<?php echo $brinquedo["id"]; ?>">
                                Editar
                            </a>
                            
                            <a href="public/excluir_brinquedo.php?id=<?php echo $brinquedo["id"]; ?>">
                                Excluir
                            </a>
                        </td>
                    </tr>
            <?php } ?>
    </table>
        </div>
</main>
            </body>
</html>