<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title></title>
</head>
<body>
    
</body>
</html>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

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

    // Consulta SQL para excluir o registro específico pelo ID
    $sql = "DELETE FROM registro_aulas WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Alerta do SweetAlert
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Registro excluído com sucesso!',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'index.php';
            });
        </script>";
    } else {
        // Alerta do SweetAlert para erro
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Erro ao excluir o registro',
                text: '" . $conn->error . "'
            }).then(function() {
                window.location.href = 'index.php';
            });
        </script>";
    }

    $conn->close();
} else {
    // Alerta do SweetAlert para ID não especificado
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'ID do registro não especificado',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location.href = 'index.php';
        });
    </script>";
}
?>
