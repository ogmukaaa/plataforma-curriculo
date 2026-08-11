CREATE TABLE dados_pessoais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(100),
    data_nascimento DATE,
    cidade VARCHAR(50),
    estado VARCHAR(2),
    nacionalidade VARCHAR(30) DEFAULT 'Brasileiro(a)',
    resumo TEXT
);

CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_curriculo INT NOT NULL,
    email VARCHAR(100),
    telefone VARCHAR(20),
    linkedin VARCHAR(150),
    github VARCHAR(150),
    link_url VARCHAR(255),
    FOREIGN KEY (id_curriculo) REFERENCES dados_pessoais(id)
);

CREATE TABLE experiencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_curriculo INT NOT NULL,
    empresa VARCHAR(100),   
    funcao VARCHAR(100),
    data_inicio VARCHAR(20),
    data_fim VARCHAR(20),
    emprego_atual BOOLEAN DEFAULT FALSE,
    descricao TEXT,
    FOREIGN KEY (id_curriculo) REFERENCES dados_pessoais(id)
);

CREATE TABLE formacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_curriculo INT NOT NULL,
    instituicao VARCHAR(100),
    curso VARCHAR(100),
    periodo VARCHAR(50),
    nivel VARCHAR(50),
    status VARCHAR(30),
    FOREIGN KEY (id_curriculo) REFERENCES dados_pessoais(id)
);