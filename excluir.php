<?php
include_once('conexao.php');   

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $deleteQuery = "DELETE FROM tarefas WHERE id = $id";  // excluindo a tarefa pelo id 

    if (mysqli_query($conexao, $deleteQuery)) {
        echo "sucesso";
    } else {
        echo "erro ao excluir: " . mysqli_error($conexao); // Exibe o erro do MySQL.
    }
} else {
    echo "id_invalido";
}
?>
