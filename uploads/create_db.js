/*
    Instrucciones SQL para crear una base de datos y una tabla.
    Solo el contenido SQL dentro de las comillas será interpretado.
*/

var scriptSQL = `
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
`;

// Solo el contenido SQL dentro del bloque será interpretado en PHP
