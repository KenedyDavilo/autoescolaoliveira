<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Registros de Aulas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            /* Oculta os botões de impressão e voltar durante a impressão */
            .no-print {
                display: none;
            }
            .table-actions {
                display: none;
            }
        }

        /* Estilos para a faixa contendo a imagem de fundo */
        .header-banner {
            background-image: url('WhatsApp Image 2023-12-04 at 16.58.08.jpeg');
            background-size: cover;
            background-position: center;
            padding: 50px 0; /* Espaçamento superior e inferior */
            text-align: center;
            margin-bottom: 20px;
        }

        .header-banner h2 {
            color: white;
        }
        
    
    </style>
</head>
<body>
<div class="tabela">
<div class="container">
    <!-- Adicionando a imagem como logotipo -->
    <img src="WhatsApp Image 2023-12-04 at 16.58.08.jpeg" alt="Logotipo" style="max-width: 200px; height: auto; margin-bottom: 20px;">
    <h2>Tabela de Registros de Aulas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Data/Hora</th>
                <th>Veículo</th>
                <th>Aula</th>
                <th>Aluno</th>
                <th>Telefone</th>
                <th class="table-actions no-print">Ações</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
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

            // Consulta SQL para selecionar os registros da tabela
            $sql = "SELECT id, data_hora, veiculo, aula, aluno, telefone FROM registro_aulas";
            $result = $conn->query($sql);

            // Exibição dos registros na tabela
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Formata a data para o formato desejado (DD/MM/AAAA HH:MM:SS)
                    $data_formatada = date('d/m/Y H:i:s', strtotime($row['data_hora']));

                    echo "<tr>";
                    echo "<td>$data_formatada</td>";
                    echo "<td>{$row['veiculo']}</td>";
                    echo "<td>{$row['aula']}</td>";
                    echo "<td>{$row['aluno']}</td>";
                    echo "<td>{$row['telefone']}</td>";
                    echo "<td class='table-actions no-print'>
                        <a href='editar.php?id={$row['id']}' class='btn btn-primary btn-sm'>Editar</a>
                        <a href='excluir.php?id={$row['id']}' class='btn btn-danger btn-sm'>Excluir</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum registro encontrado</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary mb-3 no-print">Voltar</a>
</div>

<script>
    function imprimirTabela() {
        // Oculta os botões de impressão e voltar quando o PDF é gerado para impressão
        document.querySelectorAll('.no-print').forEach(function(el) {
            el.style.display = 'none';
        });

        window.print(); // Chama a função de impressão do navegador
        
        window.onbeforeprint = function() {
            document.querySelectorAll('.hide-on-print').forEach(function(el) {
                el.style.display = 'inline-block'; // ou 'block' dependendo do tipo de elemento
            });
        };
    }
</script>

<div class="container">
    <!-- Botão para imprimir a tabela -->
    <button onclick="imprimirTabela()" class="btn btn-primary no-print">Imprimir Tabela</button>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
