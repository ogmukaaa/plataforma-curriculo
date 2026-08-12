<?php
require_once 'crud.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    update($pdo, 'dados_pessoais', [
        'nome' => $_POST['nome'],
        'cargo' => $_POST['cargo'],
        'data_nascimento' => $_POST['data_nascimento'],
        'cidade' => $_POST['cidade'],
        'estado' => $_POST['estado'],
        'nacionalidade' => $_POST['nacionalidade'],
        'resumo' => $_POST['resumo'],
    ], 'id = :id', [':id' => $id])

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Currículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>