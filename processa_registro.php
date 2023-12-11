<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
// Verifica se os dados foram enviados pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações de conexão com o banco de dados (substitua pelos seus dados)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registro de aulas";

    // Cria a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão foi estabelecida corretamente
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara os dados recebidos do formulário para serem inseridos no banco de dados
    $data_hora = $_POST['data_hora'];
    $veiculo = $_POST['veiculo'];
    $aula = $_POST['aula'];
    $aluno = $_POST['aluno'];
    $telefone = $_POST['telefone'];

    // Query SQL para inserir os dados na tabela registro_aulas
    $sql = "INSERT INTO registro_aulas (data_hora, veiculo, aula, aluno,  telefone)
            VALUES ('$data_hora', '$veiculo', '$aula', '$aluno',  '$telefone')";

// Sua lógica para conexão ao banco de dados e criação da query SQL

if ($conn->query($sql) === TRUE) {
    echo "<script>
            // Exibir mensagem de sucesso usando SweetAlert
            Swal.fire({
                title: 'Sucesso!',
                text: 'Registro inserido com sucesso!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                // Redirecionar ou realizar outras ações após clicar em 'OK'
                if (result.isConfirmed) {
                    window.location.href = 'Registro.php';
                }
            });
         </script>";
} else {
    echo "<script>
            // Exibir mensagem de erro usando SweetAlert
            Swal.fire({
                title: 'Erro!',
                text: 'Erro ao inserir registro: " . $conn->error . "',
                icon: 'error',
                confirmButtonText: 'OK'
            });
         </script>";
}



    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    echo "Erro: método inválido para envio de dados.";
}
?>
