CREATE DATABASE betterfood;

USE betterfood;

CREATE TABLE products(

    id_produto INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome_produto VARCHAR(100) NOT NULL,

    -- Valores Nutricionais
    carboidratos_produto INT NOT NULL,
    proteinas_produto INT NOT NULL,
    gorduras_totais_produto INT NOT NULL,

    peso_produto INT NOT NULL,

    validade_produto DATE NULL,
    lote_produto INT NOT NULL,

    PRIMARY KEY (id_produto)
);


