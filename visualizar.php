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

        <div class="cv-body">
            <aside class="cv-sidebar">
                <div class="cv-section">
                    <h3>Contato</h3>
                    <ul>
                        <?php if (!empty($contato['email'])): ?>
                            <li><span>Email</span><?= htmlspecialchars($contato['email']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($contato['telefone'])): ?>
                            <li><span>Telefone</span><?= htmlspecialchars($contato['telefone']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($contato['linkedin'])): ?>
                            <li><span>LinkedIn</span><?= htmlspecialchars($contato['linkedin']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($contato['github'])): ?>
                            <li><span>GitHub</span><?= htmlspecialchars($contato['github']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($contato['link_url'])): ?>
                            <li><span>Site</span><?= htmlspecialchars($contato['link_url']) ?></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="cv-section">
                    <h3>Dados Pessoais</h3>
                    <ul>
                        <?php if (!empty($dados['data_nascimento'])): ?>
                            <li><span>Nascimento</span><?= htmlspecialchars($dados['data_nascimento']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($dados['cidade']) || !empty($dados['estado'])): ?>
                            <li><span>Localização</span><?= htmlspecialchars(trim(($dados['cidade'] ?? '') . ' - ' . ($dados['estado'] ?? ''), ' -')) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($dados['nacionalidade'])): ?>
                            <li><span>Nacionalidade</span><?= htmlspecialchars($dados['nacionalidade']) ?></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="cv-section">
                    <h3>Formação</h3>
                    <p>
                        <strong><?= htmlspecialchars($formacao['curso'] ?? '') ?></strong><br>
                        <?= htmlspecialchars($formacao['instituicao'] ?? '') ?><br>
                        <?= htmlspecialchars($formacao['periodo'] ?? '') ?>
                        <?php if (!empty($formacao['nivel'])): ?> · <?= htmlspecialchars($formacao['nivel']) ?><?php endif; ?>
                        <?php if (!empty($formacao['status'])): ?> · <?= htmlspecialchars($formacao['status']) ?><?php endif; ?>
                    </p>
                </div>
            </aside>

            <main class="cv-main">
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
            </main>
        </div>
    </div>

    <div class="cv-actions">
        <a href="index.php">&larr; Voltar</a>
        <a href="editar.php?id=<?= $dados['id'] ?>" class="btn-editar">Editar</a>
    </div>
</body>
</html>