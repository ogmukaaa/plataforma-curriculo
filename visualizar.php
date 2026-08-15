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
    <div class="cv-page">
        <div class="cv-header">
            <h1><?= htmlspecialchars($dados['nome'] ?? '') ?></h1>
            <p class="cv-cargo"><?= htmlspecialchars($dados['cargo'] ?? '') ?></p>
        </div>

        <div class="cv-section">
            <h3>Contato</h3>
            <?php if (!empty($contato['email'])): ?><p><strong>Email:</strong> <?= htmlspecialchars($contato['email']) ?></p><?php endif; ?>
            <?php if (!empty($contato['telefone'])): ?><p><strong>Telefone:</strong> <?= htmlspecialchars($contato['telefone']) ?></p><?php endif; ?>
            <?php if (!empty($contato['linkedin'])): ?><p><strong>LinkedIn:</strong> <?= htmlspecialchars($contato['linkedin']) ?></p><?php endif; ?>
            <?php if (!empty($contato['github'])): ?><p><strong>GitHub:</strong> <?= htmlspecialchars($contato['github']) ?></p><?php endif; ?>
            <?php if (!empty($contato['link_url'])): ?><p><strong>Site:</strong> <?= htmlspecialchars($contato['link_url']) ?></p><?php endif; ?>
        </div>

        <div class="cv-section">
            <h3>Dados Pessoais</h3>
            <?php if (!empty($dados['data_nascimento'])): ?><p><strong>Nascimento:</strong> <?= htmlspecialchars($dados['data_nascimento']) ?></p><?php endif; ?>
            <?php if (!empty($dados['cidade']) || !empty($dados['estado'])): ?>
                <p><strong>Localização:</strong> <?= htmlspecialchars(trim(($dados['cidade'] ?? '') . ' - ' . ($dados['estado'] ?? ''), ' -')) ?></p>
            <?php endif; ?>
            <?php if (!empty($dados['nacionalidade'])): ?><p><strong>Nacionalidade:</strong> <?= htmlspecialchars($dados['nacionalidade']) ?></p><?php endif; ?>
        </div>

        <?php if (!empty($dados['resumo'])): ?>
            <div class="cv-section">
                <h3>Resumo</h3>
                <p><?= nl2br(htmlspecialchars($dados['resumo'])) ?></p>
            </div>
        <?php endif; ?>

        <div class="cv-section">
            <h3>Experiência Profissional</h3>
            <h4><?= htmlspecialchars($experiencia['funcao'] ?? '') ?><?php if (!empty($experiencia['empresa'])): ?> — <?= htmlspecialchars($experiencia['empresa']) ?><?php endif; ?></h4>
            <p class="cv-periodo">
                <?= htmlspecialchars($experiencia['data_inicio'] ?? '') ?>
                &ndash;
                <?= htmlspecialchars($experiencia['data_fim'] ?? '') ?>
                <?php if (!empty($experiencia['emprego_atual'])): ?> · <?= htmlspecialchars($experiencia['emprego_atual']) ?><?php endif; ?>
            </p>
            <p><?= nl2br(htmlspecialchars($experiencia['descricao'] ?? '')) ?></p>
        </div>

        <div class="cv-section">
            <h3>Formação</h3>
            <h4><?= htmlspecialchars($formacao['curso'] ?? '') ?></h4>
            <p class="cv-periodo">
                <?= htmlspecialchars($formacao['instituicao'] ?? '') ?>
                <?php if (!empty($formacao['periodo'])): ?> · <?= htmlspecialchars($formacao['periodo']) ?><?php endif; ?>
            </p>
            <p>
                <?= htmlspecialchars($formacao['nivel'] ?? '') ?>
                <?php if (!empty($formacao['status'])): ?> · <?= htmlspecialchars($formacao['status']) ?><?php endif; ?>
            </p>
        </div>
    </div>

    <div class="cv-actions">
        <a href="index.php">&larr; Voltar</a>
        <a href="editar.php?id=<?= $dados['id'] ?>" class="btn-editar">Editar</a>
    </div>
</body>
</html>