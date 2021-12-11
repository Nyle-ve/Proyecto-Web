CREATE DATABASE Tienda;
USE Tienda;
CREATE TABLE Producto(
	id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(20) NOT NULL,
	existencia INT,
	precio FLOAT NOT NULL,
    imagen VARCHAR(100)
);

INSERT INTO Producto(nombre_producto, existencia, precio, imagen) 
VALUES('Vela Burbuja', 14, 250, 'bubble.jpg');
INSERT INTO Producto(nombre_producto, existencia, precio, imagen) 
VALUES('Vela Griega', 17, 400, 'griego.jpg');
INSERT INTO Producto(nombre_producto, existencia, precio, imagen) 
VALUES('Vela Nudo', 12, 300, 'nudo.jpg');
INSERT INTO Producto(nombre_producto, existencia, precio, imagen) 
VALUES('Vela Macarrón', 9, 200, 'macarron.jpg');

INSERT INTO Producto(nombre_producto, existencia, precio, imagen) 
VALUES('Vela Pandita', 8, 350, 'pandita.jpg');
INSERT INTO Producto(nombre_producto, existencia, precio, imagen) 
VALUES('Vela Floral', 7, 400, 'floral.jpg');
INSERT INTO Producto(nombre_producto, existencia, precio, imagen) 
VALUES('Vela YingYang', 5, 300, 'yingyang.jpg');
INSERT INTO Producto(nombre_producto, existencia, precio, imagen) 
VALUES('Vela Infitino', 2, 250, '8.jpg');

CREATE TABLE Usuario(
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(10) NOT NULL,
    papellido VARCHAR(12) NOT NULL,
    sapellido VARCHAR(12) NOT NULL,
	email VARCHAR(50) UNIQUE NOT NULL,
    pw VARCHAR(25) NOT NULL
);

INSERT INTO Usuario(nombre, papellido, sapellido, email, pw) 
VALUES('Evelyn', 'González', 'Aragón', 'evgo_19@alu.uabcs.mx', '123456');

CREATE TABLE Pedidos(
	id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    idProducto INT NOT NULL,
    fecha DATETIME NOT NULL
);

CREATE TABLE Comentarios(
	id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    comentario VARCHAR(50) NOT NULL
);

CREATE TABLE Compras(
	id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_producto INT NOT NULL,
    fecha DATETIME NOT NULL
);

SET SQL_SAFE_UPDATES = 0;