

<!DOCTYPE html>
<html>
<head>
    <title>Editar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            
            font-family: Arial, sans-serif;
        }

        .container {
            width: 40%;
            margin: 50px auto;
            background-color: #e9ecefc9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px #000000;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            display: block;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Editar Registro</h2>
    <?php
    // Verifique se o ID do registro foi passado via parâmetro GET
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

        // Consulta SQL para obter os dados do registro específico pelo ID
        $sql = "SELECT id, data_hora, veiculo, aula, aluno, telefone FROM registro_aulas WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Formulário de edição
           
        } else {
            echo "Nenhum registro encontrado com o ID: $id";
        }

        $conn->close();
    } else {
        echo "ID do registro não especificado.";
    }
    ?>
    <form action="salvar_edicao.php" method="POST">
        <!-- Campos do formulário de edição -->
        <label>Data/Hora:</label>
        <input type="text" name="data_hora" value="<?php echo $row['data_hora']; ?>"><br>
        
        <label>Veículo:</label>
        <input type="text" name="veiculo" value="<?php echo $row['veiculo']; ?>"><br>
        
        <label>Aula:</label>
        <input type="text" name="aula" value="<?php echo $row['aula']; ?>"><br>
        
        <label>Aluno:</label>
        <input type="text" name="aluno" value="<?php echo $row['aluno']; ?>"><br>
        
        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $row['telefone']; ?>"><br>
        
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit" value="Salvar Alterações">
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
