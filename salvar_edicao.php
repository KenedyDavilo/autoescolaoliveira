<?php
// Verifica se os dados foram enviados pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos foram preenchidos
    if (isset($_POST['id']) && isset($_POST['data_hora']) && isset($_POST['veiculo']) && isset($_POST['aula']) && isset($_POST['aluno']) && isset($_POST['telefone'])) {
        $id = $_POST['id'];
        $data_hora = $_POST['data_hora'];
        $veiculo = $_POST['veiculo'];
        $aula = $_POST['aula'];
        $aluno = $_POST['aluno'];
        $telefone = $_POST['telefone'];

        // Conexão com o banco de dados (substitua pelas suas credenciais)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registro de aulas";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Atualiza o registro no banco de dados
        $sql = "UPDATE registro_aulas SET data_hora='$data_hora', veiculo='$veiculo', aula='$aula', aluno='$aluno', telefone='$telefone' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            // Redireciona para a página principal após a atualização
            header("Location: Registro.php");
            exit();
        } else {
            echo "Erro ao atualizar o registro: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Método inválido de requisição.";
}
?>
