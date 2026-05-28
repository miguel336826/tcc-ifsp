DROP DATABASE IF EXISTS db_tcc;
CREATE DATABASE db_tcc;
USE db_tcc;
CREATE TABLE IF NOT EXISTS usuario(
    id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(255) NOT NULL,
    sobrenome_usuario VARCHAR(255) NOT NULL,
    nascimento_usuario VARCHAR(255) NOT NULL,
    senha_usuario VARCHAR(255) NOT NULL,
    email_usuario VARCHAR(255) NOT NULL,
    imagem_usuario VARCHAR(255),
    token_usuario VARCHAR(255),
    UNIQUE(email_usuario)
)AUTO_INCREMENT = 1;
CREATE TABLE IF NOT EXISTS administrador(
    id_admin INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_admin VARCHAR(255) NOT NULL,
    sobrenome_admin VARCHAR(255) NOT NULL,
    nascimento_admin VARCHAR(255) NOT NULL,
    senha_admin VARCHAR(255) NOT NULL,
    email_admin VARCHAR(255) NOT NULL,
    imagem_admin VARCHAR(255),
    token_admin VARCHAR(255),
    UNIQUE(email_admin)
)AUTO_INCREMENT = 1;
INSERT INTO administrador(id_admin, nome_admin, sobrenome_admin, nascimento_admin, senha_admin, email_admin, token_admin) VALUES (1, "admin", "admin", "01/01/2001", "$2y$10$9ep7P/UZYv.NOc7O20Cfo.glBtiYKRUyZzPf4ryxWcM2s/QwkCDQq", "admin@email.com", NULL);
/*  senha do admin: Admin123*   */
CREATE TABLE IF NOT EXISTS textosdidaticos(
    id_texto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    conteudo LONGTEXT NOT NULL
)AUTO_INCREMENT = 1;
CREATE TABLE IF NOT EXISTS videoaulas(
    id_videoaula INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo_vd VARCHAR(255) NOT NULL,
    descricao_vd VARCHAR(255) NOT NULL,
    link VARCHAR(777) NOT NULL
)AUTO_INCREMENT = 1;
CREATE TABLE IF NOT EXISTS formulas(
    id_formula INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo_fo VARCHAR(255) NOT NULL,
    materia VARCHAR(255) NOT NULL,
    expressao VARCHAR(255) NOT NULL
)AUTO_INCREMENT = 1;
CREATE TABLE IF NOT EXISTS assuntoexercicio(
    id_assunto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    assunto VARCHAR(255) NOT NULL
)AUTO_INCREMENT = 1;
CREATE TABLE IF NOT EXISTS exercicios(
    id_exercicio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    enunciado LONGTEXT NOT NULL,
    comando LONGTEXT NOT NULL,
    alt_a VARCHAR(255) NOT NULL,
    alt_b VARCHAR(255) NOT NULL,
    alt_c VARCHAR(255) NOT NULL,
    alt_d VARCHAR(255) NOT NULL,
    alt_e VARCHAR(255) NOT NULL,
    correto VARCHAR(255) NOT NULL,
    explicacao LONGTEXT NOT NULL,
    id_assunto INT NOT NULL,
    FOREIGN KEY (id_assunto) REFERENCES assuntoexercicio(id_assunto)
)AUTO_INCREMENT = 1;
CREATE TABLE IF NOT EXISTS comentarios(
    id_comentario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    nome_usuario VARCHAR(255) NOT NULL,
    sobrenome_usuario VARCHAR(255) NOT NULL,
    id_videoaula INT NOT NULL,
    texto_comentario LONGTEXT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_videoaula) REFERENCES videoaulas(id_videoaula)
)AUTO_INCREMENT = 1;
CREATE TABLE IF NOT EXISTS textosfavoritos(
    id_texto INT NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_texto) REFERENCES textosdidaticos(id_texto),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);
CREATE TABLE IF NOT EXISTS videoaulasfavoritas(
    id_videoaula INT NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_videoaula) REFERENCES videoaulas(id_videoaula),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);
CREATE TABLE IF NOT EXISTS formulasfavoritas(
    id_formula INT NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_formula) REFERENCES formulas(id_formula),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);