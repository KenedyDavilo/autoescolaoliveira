<?php
// Conexão com o banco de dados
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Listagem dos registros
$sql = "SELECT id, data_hora, veiculo, aula, aluno, telefone FROM RegistroAulas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Data/Hora: " . $row["data_hora"] . " - Veículo: " . $row["veiculo"] . " - Aula: " . $row["aula"] . " - Aluno: " . $row["aluno"] . " - Telefone: " . $row["telefone"];
        echo " <a href='editar.php?id=" . $row["id"] . "'>Editar</a> <a href='excluir.php?id=" . $row["id"] . "'>Excluir</a><br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro de aulas";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Listagem dos registros
$sql = "SELECT id, data_hora, veiculo, aula, aluno, telefone FROM RegistroAulas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Data/Hora: " . $row["data_hora"] . " - Veículo: " . $row["veiculo"] . " - Aula: " . $row["aula"] . " - Aluno: " . $row["aluno"] . " - Telefone: " . $row["telefone"];
        echo " <a href='editar.php?id=" . $row["id"] . "'>Editar</a> <a href='excluir.php?id=" . $row["id"] . "'>Excluir</a><br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
