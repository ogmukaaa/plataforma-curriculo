<?php
require_once 'crud.php';

$curriculos = readAll($pdo, 'dados_pessoais');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Currículo Digital</title>
</head>
<body>
    <header>
        <h1>Plataforma de Currículos</h1>
        <a href="criar.php">+ Criar um novo Currículo</a>
    </header>

    <main>
        <?php if (empty($curriculos)): ?>

            <p class="vazio">Nenhum currículo adicionado ainda.</p>

        <?php else: ?>

            <h2>Currículos Cadastrados</h2>
            <div class="lista-curriculos">
                <?php foreach ($curriculos as $curriculo): ?>
                    <div class="card">
                        <h2><?= htmlspecialchars($curriculo['nome'] ?? '') ?></h2>
                        <p class="cargo"><?= htmlspecialchars($curriculo['cargo'] ?? '') ?></p>
                        <p class="resumo"><?= htmlspecialchars($curriculo['resumo'] ?? '') ?></p>

                        <div class="acoes">
                            <a href="visualizar.php?id=<?= $curriculo['id'] ?>" class="btn-ver">Ver</a>
                            <a href="editar.php?id=<?= $curriculo['id'] ?>" class="btn-editar">Editar</a>
                            <a href="delete.php?id=<?= $curriculo['id'] ?>" class="btn-excluir">Excluir</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </main>
</body>
</html>