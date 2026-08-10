<?php
require_once 'crud.php'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_curriculo = create($pdo, 'dados_pessoais', [
        'nome' => $_POST['nome'],
        'cargo' => $_POST['cargo'],
        'data_nascimento' => $_POST['data_nasc'],
        'cidade' => $_POST['cidade'],
        'estado' => $_POST['estado'],
        'nacionalidade' => $_POST['nacionalidade'],
        'resumo' => $_POST['resumo'],
    ]);


    create($pdo, 'contatos', [
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'linkedin' => $_POST['linkedin'],
        'github' => $_POST['github'],
        'link_url' => $_POST['link_url'],
    
    ]);

    create($pdo, 'experiencias', [
        'empresa' => $_POST['empresa'],
        'funcao' => $_POST['funcao'],
        'data_inicio' => $_POST['data_inicio'],
        'data_fim' => $_POST['data_fim'],
        'emprego_atual' => $_POST['emprego_atual'],
        'descricao' => $_POST['descricao'],
    ]);

    create($pdo, 'formacao', [
        'instituicao' => $_POST['instituicao'],
        'curso' => $_POST['curso'],
        'periodo' => $_POST['periodo'],
        'nivel' => $_POST['nivel'],
        'status' => $_POST['status'],
    ]);

    header('location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>