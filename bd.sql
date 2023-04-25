CREATE DATABASE BD_bienesRices;
SHOW DATABASES;

USE BD_bienesRaices;
SELECT * FROM vendedores;

USE BD_bienesRices;
CREATE TABLE vendedores(
    id INT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    CONSTRAINT pk_vendedores PRIMARY KEY(id)
)
USE BD_bienesRices;
INSERT INTO vendedores(nombre, apellido, telefono) VALUES('alberto', 'Perez', '7461208888');
INSERT INTO vendedores(nombre, apellido, telefono) VALUES('Jorge', 'Perez', '7461208888');
INSERT INTO vendedores(nombre, apellido, telefono) VALUES('Adolfo', 'Perez', '7461208888');

USE BD_bienesRices;
CREATE TABLE propiedades(
    id INT AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(50) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(200) NOT NULL,
    descripcion LONGTEXT NOT NULL,
    habitaciones INT(1) NOT NULL,
    wc INT(1) NOT NULL,
    estacionamiento int(1) NOT NULL,
    creado DATE NOT NULL,
    vendedor_id INT NOT NULL,
    CONSTRAINT pk_propiedad PRIMARY KEY(id),
    CONSTRAINT fk_propiedad_vendedor FOREIGN KEY(vendedor_id) REFERENCES vendedores(id)
);

USE BD_bienesRices;
CREaTE TABLE usuarios(
    id INT AUTO_INCREMENT NOT NULL,
    email VARCHAR(50) NOT NULL,
    password CHAR(60),
    CONSTRAINT PK_usuario PRIMARY KEY(ID)
)

USE BD_bienesRices;
SHOW TABLES;
DESC vendedores;