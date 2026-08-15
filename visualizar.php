<?php
require_once 'crud.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$dados       = read($pdo, 'dados_pessoais', "id = $id");
$contato     = read($pdo, 'contatos', "id_curriculo = $id");
$experiencia = read($pdo, 'experiencias', "id_curriculo = $id");
$formacao    = read($pdo, 'formacao', "id_curriculo = $id");

if (!$dados) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Visualizar Currículo</title>
</head>
<body>
    <a href="index.php">&larr; Voltar</a>

    <h1><?= htmlspecialchars($dados['nome'] ?? '') ?></h1>
    <p class="cargo"><?= htmlspecialchars($dados['cargo'] ?? '') ?></p>

    <h2>Dados Pessoais</h2>
    <p><strong>Data de Nascimento:</strong> <?= htmlspecialchars($dados['data_nascimento'] ?? '') ?></p>
    <p><strong>Cidade:</strong> <?= htmlspecialchars($dados['cidade'] ?? '') ?></p>
    <p><strong>Estado:</strong> <?= htmlspecialchars($dados['estado'] ?? '') ?></p>
    <p><strong>Nacionalidade:</strong> <?= htmlspecialchars($dados['nacionalidade'] ?? '') ?></p>
    <p><strong>Resumo:</strong> <?= nl2br(htmlspecialchars($dados['resumo'] ?? '')) ?></p>

    <h2>Contatos</h2>
    <p><strong>Email:</strong> <?= htmlspecialchars($contato['email'] ?? '') ?></p>
    <p><strong>Telefone:</strong> <?= htmlspecialchars($contato['telefone'] ?? '') ?></p>
    <p><strong>LinkedIn:</strong> <?= htmlspecialchars($contato['linkedin'] ?? '') ?></p>
    <p><strong>GitHub:</strong> <?= htmlspecialchars($contato['github'] ?? '') ?></p>
    <p><strong>Link:</strong> <?= htmlspecialchars($contato['link_url'] ?? '') ?></p>

    <h2>Experiência</h2>
    <p><strong>Empresa:</strong> <?= htmlspecialchars($experiencia['empresa'] ?? '') ?></p>
    <p><strong>Função:</strong> <?= htmlspecialchars($experiencia['funcao'] ?? '') ?></p>
    <p><strong>Início:</strong> <?= htmlspecialchars($experiencia['data_inicio'] ?? '') ?></p>
    <p><strong>Fim:</strong> <?= htmlspecialchars($experiencia['data_fim'] ?? '') ?></p>
    <p><strong>Emprego atual:</strong> <?= htmlspecialchars($experiencia['emprego_atual'] ?? '') ?></p>
    <p><strong>Descrição:</strong> <?= nl2br(htmlspecialchars($experiencia['descricao'] ?? '')) ?></p>

    <h2>Formação</h2>
    <p><strong>Instituição:</strong> <?= htmlspecialchars($formacao['instituicao'] ?? '') ?></p>
    <p><strong>Curso:</strong> <?= htmlspecialchars($formacao['curso'] ?? '') ?></p>
    <p><strong>Período:</strong> <?= htmlspecialchars($formacao['periodo'] ?? '') ?></p>
    <p><strong>Nível:</strong> <?= htmlspecialchars($formacao['nivel'] ?? '') ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($formacao['status'] ?? '') ?></p>

    <a href="editar.php?id=<?= $dados['id'] ?>" class="btn-editar">Editar</a>
</body>
</html>