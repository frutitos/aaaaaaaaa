CREATE DATABASE IF NOT EXISTS pruebaspiris;
USE pruebaspiris;
CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    apellido VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    pass VARCHAR(200) NOT NULL,
    PRIMARY KEY (id)
);
