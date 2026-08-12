<?php
require_once 'crud.php';

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
    <link rel="stylesheet" href="style.css">
    <title>Criar Currículo</title>
</head>
<body>
    <h1>Criar Currículo</h1>
    <!-- Dados Pessoais -->
     <h2>Dados Pessoais</h2>
     <form action="" method="post"></form>
        <input type="text" name="nome" placeholder="Nome Completo"><br>
        <input type="date" name="data_nasc" placeholder="Data Nascimento"><br>
        <input type="text" name="cidade" placeholder="cidade"><br>
        <input type="text" name="estado" placeholder="estado"><br>
        <input type="text" name="nacionalidade" placeholder="nacionalidade"><br>
        <input type="text" name="resumo" placeholder="Fale sobre suas qualidade e competências 
        e Objetivo profissional"><br>

    <h2>Contatos</h2>
    <form action="" method="post"></form>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="number" name="telefone" placeholder="Telefone"><br>
        <input type="text" name="linkedin" placeholder="linkedin"><br>
        <input type="text" name="github" placeholder="github"><br>
        <input type="text" name="link_url" placeholder="https://site-pessoal.com"><br>

    <h2>Experiencia</h2>
    <form action="" method="post"></form>
        <input type="text" name="empresa" placeholder="Empresa"><br>
        <input type="text" name="funcao" placeholder="funcao"><br>
        <input type="date" name="data_inicio"><br>
        <input type="date" name="data_fim"><br>
        <input type="date" name="emprego_atual"><br>

    <h2>Formação</h2>
    <form action="" method="post"></form>
        <input type="text" name="instituicao" placeholder="instituicao"><br>
        <input type="text" name="periodo" placeholder="periodo"><br>
        <input type="text" name="nivel" placeholder="Nivel (Técnico, Técnólogo, Bacharelado..."><br>
        <input type="text" name="status" placeholder="Status"><br>


    <button type="submit" class="btnCriar">Criar Currículo</button>


</body>
</html>