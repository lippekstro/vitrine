CREATE DATABASE vitrine;

CREATE TABLE categorias (
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nome_categoria VARCHAR(255) NOT NULL,
    img_categoria LONGBLOB
);

CREATE TABLE produtos (
    id_produto INT PRIMARY KEY AUTO_INCREMENT,
    nome_produto VARCHAR(255) NOT NULL,
    preco DECIMAL(6,2) NOT NULL,
    img_produto LONGBLOB,
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES categorias (id_categoria)
);

CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    img_usuario LONGBLOB,
    nivel_acesso INT DEFAULT 1
);

INSERT INTO categorias (nome_categoria)
VALUES ('Roupas');

INSERT INTO categorias (nome_categoria)
VALUES ('Calçados');

INSERT INTO categorias (nome_categoria)
VALUES ('Acessórios');

-- Inserir 10 roupas
INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Camisa Branca', 19.99, 1);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Calça Jeans Skinny', 39.99, 1);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Vestido Estampado', 29.99, 1);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Camisa Polo', 24.99, 1);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Jaqueta de Couro', 59.99, 1);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Shorts', 19.99, 1);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Camiseta', 34.99, 1);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Suéter', 44.99, 1);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Saia', 27.99, 1);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Colete', 29.99, 1);

-- Inserir 5 calçados
INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Tênis Esportivo', 49.99, 2);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('All Star', 59.99, 2);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Sandália', 9.99, 2);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Botas de Inverno', 74.99, 2);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Chinelo de Praia', 29.99, 2);

-- Inserir 5 acessórios
INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Bolsa de Couro', 29.99, 3);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Colar de Prata', 14.99, 3);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Óculos de Sol', 19.99, 3);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Carteira de Couro', 22.99, 3);

INSERT INTO produtos (nome_produto, preco, id_categoria)
VALUES ('Relógio', 9.99, 3);
