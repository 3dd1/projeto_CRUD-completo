
<?php
$dbHost = "localhost";
$dbUsername = "root";                // <--- conexao com o banco de dados
$dbPassword = "";
$dbName = "trabalho_crud";

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

// if($conexao->connect_error)
// {                           // teste para ver se conectou :)
//     echo "Error";
// }
// else
// {
//     echo "Conexão efetuada com sucesso";
// }
