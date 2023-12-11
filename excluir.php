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
    <style> 
    body {
            
            font-family: Arial, sans-serif;
        }</style>
</body>
</html>
<?php
// Verifique se o ID do registro foi passado via parâmetro GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Exibir um alerta de confirmação usando SweetAlert antes de excluir o registro
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
    echo "<script>
        Swal.fire({
            title: 'Tem certeza?',
            text: 'Você deseja excluir este registro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Se o usuário confirmar, executar a exclusão do registro
                window.location.href = 'excluir_confirmado.php?id=$id';
            }
        });
    </script>";
} else {
    echo "ID do registro não especificado.";
}
?>
