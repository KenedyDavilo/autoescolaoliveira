<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
</body>
</html>
<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = '$email'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            header("Location: painel.php");
            exit(); // Importante sair para evitar execução adicional
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: 'Senha incorreta!',
                    }).then(function() {
                        window.location.href = 'login.php'; // Redirecionamento após alerta
                    });
                 </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Opss',
                    text: 'Usuário não encontrado!',
                }).then(function() {
                    window.location.href = 'login.php'; // Redirecionamento após alerta
                });
             </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Adicione os links para os arquivos CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
   img {
     
      top: -2px;
      width: 520px;
      left: -17px;
  }
        body{
            background-image: linear-gradient(800deg, #87CEFA,#0000FF);
        }
        .tabela {
            background-color: #e9ecefc9;
            width: 20%;
            height: 300px;
            margin: 0 auto;
            border-radius: 3%;
            position: absolute;
            top: 50%; /* Centraliza verticalmente */
            left: 50%; /* Centraliza horizontalmente */
            transform: translate(-40%, -50%);
            font-family: sans-serif;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px #000000;
        }

    </style>
</head>
<body>

<div class="container mt-5">
    <div class="tabela">
        <h2 class="mb-4">Login</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary" style="
    background: green;">Entrar</button>

            <a href="cadastro.php" class="btn btn-primary">Cadastre-se</a>
        </form>
    </div>
</div>

<!-- Adicione os links para os arquivos JavaScript do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<img id="minhaImagem" src="Login-rafiki.png" alt=" imagem" width="500px">
</body>
</html>