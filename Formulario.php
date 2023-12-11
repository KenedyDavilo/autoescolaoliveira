<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro de Aulas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(800deg, #87CEFA, #0000FF);
        }
        
        .tabela {
            background-color: #e9ecefc9;
            width: 60%; /* Alterei a largura da tabela para 60% */
            max-width: 500px; /* Limitando a largura máxima da tabela */
            margin: 0 auto;
            border-radius: 3%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: sans-serif;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px #000000;
        }
    </style>
</head>
<body>
    <div class="tabela">
        <div class="container mt-5">
            <h2>Registro de Aulas</h2>
            <form action="processa_registro.php" method="POST">
                <div class="mb-3">
                    <label for="data_hora" class="form-label">Data/Hora</label>
                    <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" required>
                </div>
                <div class="mb-3">
                    <label for="veiculo" class="form-label">Veículo</label>
                    <input type="text" class="form-control" id="veiculo" name="veiculo" required>
                </div>
                <div class="mb-3">
                    <label for="aula" class="form-label">Aula</label>
                    <input type="text" class="form-control" id="aula" name="aula" required>
                </div>
                <div class="mb-3">
                    <label for="aluno" class="form-label">Aluno</label>
                    <input type="text" class="form-control" id="aluno" name="aluno" required>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
