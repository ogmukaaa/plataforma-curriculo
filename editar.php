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
        'emprego_atual' => $_POST['emprego_atual'],
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="editar.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($dados['id']) ?>">

            <div class="form-section">
                <h2>Dados Pessoais</h2>

                <div class="campo">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($dados['nome'] ?? '') ?>" required>
                </div>

                <div class="campo">
                    <label for="cargo">Cargo</label>
                    <input type="text" id="cargo" name="cargo" value="<?= htmlspecialchars($dados['cargo'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="data_nasc">Data de Nascimento</label>
                    <input type="date" id="data_nasc" name="data_nasc" value="<?= htmlspecialchars($dados['data_nascimento'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" value="<?= htmlspecialchars($dados['cidade'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="estado">Estado</label>
                    <input type="text" id="estado" name="estado" value="<?= htmlspecialchars($dados['estado'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="nacionalidade">Nacionalidade</label>
                    <input type="text" id="nacionalidade" name="nacionalidade" value="<?= htmlspecialchars($dados['nacionalidade'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="resumo">Resumo</label>
                    <textarea id="resumo" name="resumo"><?= htmlspecialchars($dados['resumo'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2>Contatos</h2>

                <div class="campo">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($contato['email'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($contato['telefone'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" id="linkedin" name="linkedin" value="<?= htmlspecialchars($contato['linkedin'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="github">GitHub</label>
                    <input type="text" id="github" name="github" value="<?= htmlspecialchars($contato['github'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="link_url">Site / Portfólio</label>
                    <input type="text" id="link_url" name="link_url" value="<?= htmlspecialchars($contato['link_url'] ?? '') ?>">
                </div>
            </div>

            <div class="form-section">
                <h2>Experiência</h2>

                <div class="campo">
                    <label for="empresa">Empresa</label>
                    <input type="text" id="empresa" name="empresa" value="<?= htmlspecialchars($experiencia['empresa'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="funcao">Função</label>
                    <input type="text" id="funcao" name="funcao" value="<?= htmlspecialchars($experiencia['funcao'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="data_inicio">Data de Início</label>
                    <input type="date" id="data_inicio" name="data_inicio" value="<?= htmlspecialchars($experiencia['data_inicio'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="data_fim">Data de Fim</label>
                    <input type="date" id="data_fim" name="data_fim" value="<?= htmlspecialchars($experiencia['data_fim'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="emprego_atual">Emprego Atual</label>
                    <input type="text" id="emprego_atual" name="emprego_atual" value="<?= htmlspecialchars($experiencia['emprego_atual'] ?? '') ?>" placeholder="Ex: Sim, atualmente / Não">
                </div>

                <div class="campo">
                    <label for="descricao">Descrição das Atividades</label>
                    <textarea id="descricao" name="descricao"><?= htmlspecialchars($experiencia['descricao'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2>Formação</h2>

                <div class="campo">
                    <label for="instituicao">Instituição</label>
                    <input type="text" id="instituicao" name="instituicao" value="<?= htmlspecialchars($formacao['instituicao'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="curso">Curso</label>
                    <input type="text" id="curso" name="curso" value="<?= htmlspecialchars($formacao['curso'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="periodo">Período</label>
                    <input type="text" id="periodo" name="periodo" value="<?= htmlspecialchars($formacao['periodo'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="nivel">Nível</label>
                    <input type="text" id="nivel" name="nivel" value="<?= htmlspecialchars($formacao['nivel'] ?? '') ?>">
                </div>

                <div class="campo">
                    <label for="status">Status</label>
                    <input type="text" id="status" name="status" value="<?= htmlspecialchars($formacao['status'] ?? '') ?>">
                </div>
            </div>

            <button type="submit" class="btnAtualizar">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>