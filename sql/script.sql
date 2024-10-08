CREATE TABLE USUARIOS (
    ID_USUARIO INT AUTO_INCREMENT PRIMARY KEY,
    NOMBRE VARCHAR(100),
    CORREO VARCHAR(100),
    CONTRASENA VARCHAR(255),
    ROL VARCHAR(25)
);

CREATE TABLE VEHICULOS (
    ID_VEHICULO INT AUTO_INCREMENT PRIMARY KEY,
    MARCA VARCHAR(100),
    MODELO VARCHAR(100),
    AÑO INT,
    PRECIO DECIMAL(10, 2),
    DESCRIPCION VARCHAR(300),
    ESTADO VARCHAR(50),
    VENDEDOR VARCHAR(100),
    TELEFONO_VENDEDOR VARCHAR(50)
);

CREATE TABLE COMPRAS (
    ID_COMPRA INT AUTO_INCREMENT PRIMARY KEY,
    ID_USUARIO INT,
    FECHA_COMPRA DATE,
    ID_VEHICULO INT,
    TOTAL DECIMAL(10, 2),
    FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO),
    FOREIGN KEY (ID_VEHICULO) REFERENCES VEHICULOS(ID_VEHICULO)
);

CREATE TABLE imagenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ruta_imagen VARCHAR(255) NOT NULL,
    id_vehiculo INT,
    FOREIGN KEY (id_vehiculo) REFERENCES vehiculos(id_vehiculo)
);

--CONTREASEÑAS 123456
INSERT INTO USUARIOS (NOMBRE, CORREO, CONTRASENA, ROL) 
VALUES ('Juan Pérez', 'juan.perez@example.com', '$2y$10$d6POOPxvzXHrTHBT./UyAe.bZFH90l1ZWDpfZZ7i7mCZEY5DejzNq', 'Administrador');
INSERT INTO USUARIOS (NOMBRE, CORREO, CONTRASENA, ROL) 
VALUES ('María López', 'maria.lopez@example.com', '$2y$10$d6POOPxvzXHrTHBT./UyAe.bZFH90l1ZWDpfZZ7i7mCZEY5DejzNq', 'Administrador');
INSERT INTO USUARIOS (NOMBRE, CORREO, CONTRASENA, ROL) 
VALUES ('Carlos García', 'carlos.garcia@example.com', '$2y$10$d6POOPxvzXHrTHBT./UyAe.bZFH90l1ZWDpfZZ7i7mCZEY5DejzNq', 'Cliente');

INSERT INTO VEHICULOS (ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR)
VALUES (1, 'Toyota', 'Hiace', 2020, 40800, 'Combustible: diesel. 3 Puertas. Kilometraje: 190.000 km. Transmisión: Manual', 'Casi nuevo', 'Jean Carlo Flores Solís', '(+506) 6015-7555');
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaHiace1-JeanCarlo.jpg', 1);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaHiace2-JeanCarlo.jpg', 1);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaHiace3-JeanCarlo.jpg', 1);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaHiace4-JeanCarlo.jpg', 1);

INSERT INTO VEHICULOS (ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR)
VALUES (2, 'Toyota', 'Rav4', 2020, 34990, 'Combustible: gasolina. 4 Puertas. Kilometraje: 38.998 km. Transmisión: Automático', 'Casi nuevo', 'Jean Carlo Flores Solís', '(+506) 6015-7555');
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/Toyota Rav41-JeanCarlos.jpg', 2);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/Toyota Rav42-JeanCarlos.jpg', 2);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/Toyota Rav43-JeanCarlos.jpg', 2);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/Toyota Rav44-JeanCarlos.jpg', 2);

INSERT INTO VEHICULOS (ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR)
VALUES (3, 'Toyota', 'Hilux', 2019, 34990, 'Combustible: diesel. 4 Puertas. Kilometraje: 72.000 km. Transmisión: Manual', 'Casi nuevo', 'Jean Carlo Flores Solís', '(+506) 6015-7555');
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaHilux1-JeanCarlos.jpg', 3);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaHilux2-JeanCarlos.jpg', 3);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaHilux3-JeanCarlos.jpg', 3);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaHilux4-JeanCarlos.jpg', 3);

INSERT INTO VEHICULOS (ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR)
VALUES (4, 'Hyundai', 'Tucson', 2016, 17890, 'Combustible: gasolina. 4 Puertas. Kilometraje: 115.678 km. Transmisión: automático', 'Casi nuevo', 'Jean Carlo Flores Solís', '(+506) 6015-7555');
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/HyundaiTucson1-JeanCarlos.jpg', 4);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/HyundaiTucson2-JeanCarlos.jpg', 4);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/HyundaiTucson3-JeanCarlos.jpg', 4);

INSERT INTO VEHICULOS (ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR)
VALUES (5, 'Suzuki', 'New Viatara', 2020, 22490, 'Combustible: gasolina. 4 Puertas. Kilometraje: 45.490 km. Transmisión: automático', 'Casi nuevo', 'Jean Carlo Flores Solís', '(+506) 6015-7555');
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/SuzukiNewViatara1-JeanCarlos.jpg', 5);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/SuzukiNewViatara2-JeanCarlos.jpg', 5);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/SuzukiNewViatara3-JeanCarlos.jpg', 5);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/SuzukiNewViatara4-JeanCarlos.jpg', 5);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/SuzukiNewViatara5-JeanCarlos.jpg', 5);

INSERT INTO VEHICULOS (ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR)
VALUES (6, 'Toyota', 'Rush', 2020, 28490, 'Combustible: gasolina. 4 Puertas. Kilometraje: 67432 km. Transmisión: automático', 'Casi nuevo', 'Jean Carlo Flores Solís', '(+506) 6015-7555');
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaRush1-JeanCarlos.jpg', 6);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaRush2-JeanCarlos.jpg', 6);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaRush3-JeanCarlos.jpg', 6);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaRush4-JeanCarlos.jpg', 6);

INSERT INTO VEHICULOS (ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR)
VALUES (7, 'Suzuki', 'New Viatara', 2022, 24990, 'Combustible: gasolina. 4 Puertas. Kilometraje: 27885 km. Transmisión: automático', 'Casi nuevo', 'Jean Carlo Flores Solís', '(+506) 6015-7555');
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/SuzukiNewViataraAzul1-JeanCarlos.jpg', 7);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/SuzukiNewViataraAzul2-JeanCarlos.jpg', 7);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/SuzukiNewViataraAzul3-JeanCarlos.jpg', 7);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/SuzukiNewViataraAzul4-JeanCarlos.jpg', 7);

INSERT INTO VEHICULOS (ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR)
VALUES (8, 'Isuzu', 'Dmax', 2017, 13800, 'Combustible: diesel. 4 Puertas. Kilometraje: 124.567 km. Transmisión: automático', 'Casi nuevo', 'Jean Carlo Flores Solís', '(+506) 6015-7555');
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/IsuzuDmax1-JeanCarlos.jpg', 8);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/IsuzuDmax2-JeanCarlos.jpg', 8);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/IsuzuDmax3-JeanCarlos.jpg', 8);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/IsuzuDmax4-JeanCarlos.jpg', 8);

INSERT INTO VEHICULOS (ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR)
VALUES (9, 'Toyota', 'Prado', 2019, 52990, 'Combustible: diesel. 4 Puertas. Kilometraje: 77.320 km. Transmisión: automático', 'Casi nuevo', 'Jean Carlo Flores Solís', '(+506) 6015-7555');
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaPrado1-JeanCarlos.jpg', 9);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaPrado2-JeanCarlos.jpg', 9);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaPrado3-JeanCarlos.jpg', 9);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/ToyotaPrado4-JeanCarlos.jpg', 9);

INSERT INTO VEHICULOS (ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR)
VALUES (10, 'Isuzu', 'NLR', 2018, 13200, 'Combustible: diesel. 2 Puertas. Kilometraje: 100.587 km. Transmisión: manual', 'Casi nuevo', 'Jean Carlo Flores Solís', '(+506) 6015-7555');
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/IsuzuNLR1-JeanCarlos.jpg', 10);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/IsuzuNLR2-JeanCarlos.jpg', 10);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/IsuzuNLR3-JeanCarlos.jpg', 10);
INSERT INTO IMAGENES (RUTA_IMAGEN, ID_VEHICULO)
VALUES('uploads/IsuzuNLR4-JeanCarlos.jpg', 10);