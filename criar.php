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
        'id_curriculo' => $id_curriculo,
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'linkedin' => $_POST['linkedin'],
        'github' => $_POST['github'],
        'link_url' => $_POST['link_url'],
    ]);

    create($pdo, 'experiencias', [
        'id_curriculo' => $id_curriculo,
        'empresa' => $_POST['empresa'],
        'funcao' => $_POST['funcao'],
        'data_inicio' => $_POST['data_inicio'],
        'data_fim' => $_POST['data_fim'],
        'emprego_atual' => $_POST['emprego_atual'],
        'descricao' => $_POST['descricao'],
    ]);

    create($pdo, 'formacao', [
        'id_curriculo' => $id_curriculo,
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
    <link rel="stylesheet" href="css/style.css">
    <title>Criar Currículo</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">

            <div class="form-section">
                <h2>Dados Pessoais</h2>

                <div class="campo">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome Completo">
                </div>

                <div class="campo">
                    <label for="cargo">Cargo</label>
                    <input type="text" id="cargo" name="cargo" placeholder="Cargo">
                </div>

                <div class="campo">
                    <label for="data_nasc">Data de Nascimento</label>
                    <input type="date" id="data_nasc" name="data_nasc">
                </div>

                <div class="campo">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" placeholder="cidade">
                </div>

                <div class="campo">
                    <label for="estado">Estado</label>
                    <input type="text" id="estado" name="estado" placeholder="estado">
                </div>

                <div class="campo">
                    <label for="nacionalidade">Nacionalidade</label>
                    <input type="text" id="nacionalidade" name="nacionalidade" placeholder="nacionalidade">
                </div>

                <div class="campo">
                    <label for="resumo">Resumo</label>
                    <textarea id="resumo" name="resumo" placeholder="Fale sobre suas qualidades e competências e Objetivo profissional"></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2>Contatos</h2>

                <div class="campo">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Email">
                </div>

                <div class="campo">
                    <label for="telefone">Telefone</label>
                    <input type="number" id="telefone" name="telefone" placeholder="Telefone">
                </div>

                <div class="campo">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" id="linkedin" name="linkedin" placeholder="linkedin">
                </div>

                <div class="campo">
                    <label for="github">GitHub</label>
                    <input type="text" id="github" name="github" placeholder="github">
                </div>

                <div class="campo">
                    <label for="link_url">Site / Portfólio</label>
                    <input type="text" id="link_url" name="link_url" placeholder="https://site-pessoal.com">
                </div>
            </div>

            <div class="form-section">
                <h2>Experiência</h2>

                <div class="campo">
                    <label for="empresa">Empresa</label>
                    <input type="text" id="empresa" name="empresa" placeholder="Empresa">
                </div>

                <div class="campo">
                    <label for="funcao">Função</label>
                    <input type="text" id="funcao" name="funcao" placeholder="funcao">
                </div>

                <div class="campo">
                    <label for="data_inicio">Data de Início</label>
                    <input type="date" id="data_inicio" name="data_inicio">
                </div>

                <div class="campo">
                    <label for="data_fim">Data de Fim</label>
                    <input type="date" id="data_fim" name="data_fim">
                </div>

                <div class="campo">
                    <label for="emprego_atual">Emprego Atual</label>
                    <input type="text" id="emprego_atual" name="emprego_atual" placeholder="Ex: Sim, atualmente / Não">
                </div>

                <div class="campo">
                    <label for="descricao">Descrição das Atividades</label>
                    <textarea id="descricao" name="descricao" placeholder="Descreva suas atividades"></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2>Formação</h2>

                <div class="campo">
                    <label for="instituicao">Instituição</label>
                    <input type="text" id="instituicao" name="instituicao" placeholder="instituicao">
                </div>

                <div class="campo">
                    <label for="curso">Curso</label>
                    <input type="text" id="curso" name="curso" placeholder="curso">
                </div>

                <div class="campo">
                    <label for="periodo">Período</label>
                    <input type="text" id="periodo" name="periodo" placeholder="periodo">
                </div>

                <div class="campo">
                    <label for="nivel">Nível</label>
                    <input type="text" id="nivel" name="nivel" placeholder="Nivel (Técnico, Tecnólogo, Bacharelado...)">
                </div>

                <div class="campo">
                    <label for="status">Status</label>
                    <input type="text" id="status" name="status" placeholder="Status">
                </div>
            </div>

            <button type="submit" class="btnCriar">Criar Currículo</button>

        </form>
    </div>
</body>
</html>