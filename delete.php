<?php
require_once 'crud.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if ($id) {
    delete($pdo, 'contatos', "id_curriculo = $id");
    delete($pdo, 'experiencias', "id_curriculo = $id");
    delete($pdo, 'formacao', "id_curriculo = $id");
    delete($pdo, 'dados_pessoais', "id = $id");
}

header('Location: index.php');
exit;