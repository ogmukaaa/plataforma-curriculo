<?php
require_once 'crud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];

    update($pdo, 'dados_pessoais', [
        'nome'            => $_POST['nome'],
        'cargo'           => $_POST['cargo'],
        'data_nascimento' => $_POST['data_nasc'],
        'cidade'          => $_POST['cidade'],
        'estado'          => $_POST['estado'],
        'nacionalidade'   => $_POST['nacionalidade'],
        'resumo'          => $_POST['resumo'],
    ], "id = $id");

    update($pdo, 'contatos', [
        'email'    => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'linkedin' => $_POST['linkedin'],
        'github'   => $_POST['github'],
        'link_url' => $_POST['link_url'],
    ], "id_curriculo = $id");

    update($pdo, 'experiencias', [
        'empresa'       => $_POST['empresa'],
        'funcao'        => $_POST['funcao'],
        'data_inicio'   => $_POST['data_inicio'],
        'data_fim'      => $_POST['data_fim'],
        'emprego_atual' => isset($_POST['emprego_atual']) ? 1 : 0,
        'descricao'     => $_POST['descricao'],
    ], "id_curriculo = $id");

    update($pdo, 'formacao', [
        'instituicao' => $_POST['instituicao'],
        'curso'       => $_POST['curso'],
        'periodo'     => $_POST['periodo'],
        'nivel'       => $_POST['nivel'],
        'status'      => $_POST['status'],
    ], "id_curriculo = $id");

    header('Location: index.php');
    exit;
}

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
    <title>Editar Currículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="editar.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($dados['id']) ?>">

        <h2>Dados Pessoais</h2>
        <input type="text" name="nome" value="<?= htmlspecialchars($dados['nome'] ?? '') ?>" required><br>
        <input type="text" name="cargo" value="<?= htmlspecialchars($dados['cargo'] ?? '') ?>"><br>
        <input type="date" name="data_nasc" value="<?= htmlspecialchars($dados['data_nascimento'] ?? '') ?>"><br>
        <input type="text" name="cidade" value="<?= htmlspecialchars($dados['cidade'] ?? '') ?>"><br>
        <input type="text" name="estado" value="<?= htmlspecialchars($dados['estado'] ?? '') ?>"><br>
        <input type="text" name="nacionalidade" value="<?= htmlspecialchars($dados['nacionalidade'] ?? '') ?>"><br>
        <textarea name="resumo"><?= htmlspecialchars($dados['resumo'] ?? '') ?></textarea><br>

        <h2>Contatos</h2>
        <input type="email" name="email" value="<?= htmlspecialchars($contato['email'] ?? '') ?>"><br>
        <input type="text" name="telefone" value="<?= htmlspecialchars($contato['telefone'] ?? '') ?>"><br>
        <input type="text" name="linkedin" value="<?= htmlspecialchars($contato['linkedin'] ?? '') ?>"><br>
        <input type="text" name="github" value="<?= htmlspecialchars($contato['github'] ?? '') ?>"><br>
        <input type="text" name="link_url" value="<?= htmlspecialchars($contato['link_url'] ?? '') ?>"><br>

        <h2>Experiência</h2>
        <input type="text" name="empresa" value="<?= htmlspecialchars($experiencia['empresa'] ?? '') ?>"><br>
        <input type="text" name="funcao" value="<?= htmlspecialchars($experiencia['funcao'] ?? '') ?>"><br>
        <input type="date" name="data_inicio" value="<?= htmlspecialchars($experiencia['data_inicio'] ?? '') ?>"><br>
        <input type="date" name="data_fim" value="<?= htmlspecialchars($experiencia['data_fim'] ?? '') ?>"><br>
        <textarea name="descricao"><?= htmlspecialchars($experiencia['descricao'] ?? '') ?></textarea><br>

        <h2>Formação</h2>
        <input type="text" name="instituicao" value="<?= htmlspecialchars($formacao['instituicao'] ?? '') ?>"><br>
        <input type="text" name="curso" value="<?= htmlspecialchars($formacao['curso'] ?? '') ?>"><br>
        <input type="text" name="periodo" value="<?= htmlspecialchars($formacao['periodo'] ?? '') ?>"><br>
        <input type="text" name="nivel" value="<?= htmlspecialchars($formacao['nivel'] ?? '') ?>"><br>
        <input type="text" name="status" value="<?= htmlspecialchars($formacao['status'] ?? '') ?>"><br>

        <button type="submit" class="btnAtualizar">Salvar Alterações</button>
    </form>
</body>
</html>