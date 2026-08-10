CREATE TABLE dados_pessoais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(100),
    resumo TEXT
);

CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_curriculo INT NOT NULL,
    email VARCHAR(100),
    telefone VARCHAR(20),
    perfil_profissional VARCHAR(150), -- ex: LinkedIn, GitHub
    FOREIGN KEY (id_curriculo) REFERENCES dados_pessoais(id) 
);

CREATE TABLE experiencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_curriculo INT NOT NULL,
    empresa VARCHAR(100),   
    funcao VARCHAR(100),
    periodo VARCHAR(50),
    descricao TEXT,
    FOREIGN KEY (id_curriculo) REFERENCES dados_pessoais(id) 
);

CREATE TABLE formacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_curriculo INT NOT NULL,
    instituicao VARCHAR(100),
    curso VARCHAR(100),
    periodo VARCHAR(50),
    FOREIGN KEY (id_curriculo) REFERENCES dados_pessoais(id) 
);