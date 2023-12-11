<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro de aulas"; // Nome do banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $data_hora = $_POST['data_hora'];
    $veiculo = $_POST['veiculo'];
    $aula = $_POST['aula'];
    $aluno = $_POST['aluno'];
    $telefone = $_POST['telefone'];

    // Atualiza os dados na tabela
    $sql = "UPDATE registro_aulas SET data_hora = '$data_hora', veiculo = '$veiculo', aula = '$aula', aluno = '$aluno', telefone = '$telefone' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o registro: " . $conn->error;
    }
}

$conn->close();
?>
