<?php
    // Conectar ao banco de dados
include_once('conexao.php');

    // Consultar as tarefas e integrantes
$result = mysqli_query($conexao, "SELECT * FROM tarefas");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto CRUD</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Gerenciamento de Tarefas Domesticas</h1>
    <div class="div_botao">
        <button class="adicionar"><a href="./form.php">Adicionar</a></button>
    </div>
    <div class="div_tabela">
        <table>
            <tr>
                <th>Id</th>
                <th>Tarefa</th>
                <th>Integrante</th>
                <th>Ações</th>
            </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td class='central'>" . $row['id'] . "</td>";
            echo "<td class='central'>" . $row['tarefa'] . "</td>";
            echo "<td class='central'>" . $row['integrante'] . "</td>";
            echo "<td class='acoes'>
                    <button class='edit'><a href='form.php?id=" . $row['id'] . "'>EDITAR</a></button> 
                    <button class='delete' data-id='" . $row['id'] . "'>EXCLUIR</button>
                  </td>";
            echo "</tr>";
        }
        ?>
        </table>
    </div>
</body>
<script src="./js/script.js"></script>
</html>
