<?php
include_once('conexao.php');

$id = null;
$tarefa = "";
$integrante = "";

// Verificar se estamos editando uma tarefa
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar os dados da tarefa no banco
    $result = mysqli_query($conexao, "SELECT * FROM tarefas WHERE id = $id");
    if ($row = mysqli_fetch_assoc($result)) {
        $tarefa = $row['tarefa'];
        $integrante = $row['integrante'];
    }
}

// Processar o formulário (inserção ou edição)
if (isset($_POST['submit'])) {
    $tarefa = $_POST['nome_tarefa'];
    $integrante = $_POST['integrante'];

    if ($id) {
        // Atualizar a tarefa existente
        $updateQuery = "UPDATE tarefas SET tarefa = '$tarefa', integrante = '$integrante' WHERE id = $id";
        mysqli_query($conexao, $updateQuery);
    } else {
        // Inserir uma nova tarefa
        $insertQuery = "INSERT INTO tarefas (tarefa, integrante) VALUES ('$tarefa', '$integrante')";
        mysqli_query($conexao, $insertQuery);
    }

    // Redirecionar para a página inicial
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto CRUD</title>
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
    
    <h1><?php echo $id ? "Editar Tarefa" : "Adicionar Tarefa"; ?></h1>
    <div class="div_botao">    
        <button class="voltar"><a href="./index.php">Voltar</a></button>
    </div>
    <form action="form.php<?php echo $id ? '?id=' . $id : ''; ?>" method="POST">
        <fieldset>
            <label for="Tarefa">Tarefa:</label>
            <input type="text" name="nome_tarefa" value="<?php echo $tarefa; ?>" required>
            <br><br>
            <label for="Integrante">Integrante:</label>
            <input type="text" name="integrante" value="<?php echo $integrante; ?>" required>
            <br><br>
            <input type="submit" name="submit" value="<?php echo $id ? "Atualizar" : "Salvar"; ?>">
        </fieldset>
    </form>
</body>
</html>