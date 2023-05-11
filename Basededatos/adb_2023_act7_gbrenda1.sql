CREATE TABLE `editorial` 
(
  `Id`      INT(2)     NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id`)
)ENGINE = InnoDB;

CREATE TABLE `libros` 
(
  `ISBN`        VARCHAR(17) NOT NULL,
  `Titulo`      VARCHAR(50) NOT NULL,
  `editorial_Id` INT(2) NOT NULL,
  PRIMARY KEY (`ISBN`),
  CONSTRAINT `fk_libros_editorial` FOREIGN KEY (`editorial_Id`) REFERENCES `editorial` (`Id`)ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;


CREATE TABLE `autor` 
(
  `Id`       INT(2)     NOT NULL,
  `Nombre`  VARCHAR(20) NOT NULL,
  `Paterno` VARCHAR(20)  NULL,
  `Materno` VARCHAR(20)  NULL,
  PRIMARY KEY (`Id`)
)ENGINE = InnoDB;


CREATE TABLE `usuarios` 
(
  `ClaveUsu`  VARCHAR(11) NOT NULL,
  `Nombre`    VARCHAR(20) NOT NULL,
  `Paterno`   VARCHAR(20) NOT NULL,
  `Materno`   VARCHAR(20) NULL,
  `Colonia`   VARCHAR(50) NOT NULL,
  `Calle`     VARCHAR(50) NOT NULL,
  `Numero`    VARCHAR(10) NOT NULL,
  `Telefono`  VARCHAR(10) NOT NULL,
  PRIMARY KEY (`ClaveUsu`)
)ENGINE = InnoDB;


CREATE TABLE `libros_autores` 
(
  `ISBN` VARCHAR(17) NOT NULL,
  `autor_Id` INT(2) NOT NULL,
  UNIQUE KEY(`ISBN`, `autor_Id`),
  CONSTRAINT `fk_libros_autores_libros1` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_libros_autores_autor1`  FOREIGN KEY (`autor_Id`) REFERENCES `autor` (`Id`)ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;



CREATE TABLE `prestamo` 
(
  `Salida`     DATE NULL,
  `Devolucion` DATE NULL,
  `ISBN`       VARCHAR(17) NOT NULL,
  `ClaveUsu`   VARCHAR(15) NOT NULL,
  CONSTRAINT `fk_prestamo_libros1`   FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_prestamo_usuarios1` FOREIGN KEY (`ClaveUsu`)REFERENCES `usuarios` (`ClaveUsu`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB;

INSERT INTO `usuarios` (`ClaveUsu`, `Nombre`, `Paterno`, `Materno`, `Colonia`, `Calle`, `Numero`, `Telefono`) VALUES
('2020001', 'Manuel', 'Alvarez', 'Diaz', 'Barrio San Antonio', 'Av. Revolucion', '#1341', '7561234567'),
('2020002', 'Angelica ', 'Perez', 'Perez', 'Barrio de San Francisco', '4 Sur', '#986', '7569876541'),
('2020003', 'Maria', 'Garcia', 'Sanchez', 'Barrio de San Francisco', '5 oriente', '#236', '7569638521'),
('260',     'Panfilo', 'Perez', 'Garcia', 'Barrio San Antonio', 'Av. Revolucion ', '#1645', '7567891235'),
('3004871', 'Socorro', 'Garcia', 'Rodriguez', 'Barrio de Santa Gertrudis', 'Jardines', '#285', ' 747485976'),
('30048710', 'Mario', 'Cortez', 'Cortez', 'Chautla', 'S/N', '#589', ' 756012398'),
('3004872', 'Victor Manuel', 'Garcia', 'Garcia', 'Nejapa', 'S/N', '#365', ' 756789458'),
('3004873', 'Federico', 'Garcia', 'Lagunas', 'Barrio de la Villa', '10 de enero', '#158', ' 756789548'),
('3004874', 'Pedro Armando', 'Vargas', 'Gonzalez', 'Los Pinos', '24 de febrero', '#335', ' 756897523'),
('3004875', 'Alberto', 'Pineda', 'Moctezuma', 'Barrio del Tecolote', '17 norte', '#758', ' 747498537'),
('3004876', 'Maria Fernanda', 'Morales', '', 'Las Palmas', '5 sur', '#87', ' 756203156'),
('3004877', 'Oscar', 'Tecolapa', 'Guzman', 'Lodo Grande', 'S/N', '#250', ' 756721036'),
('3004878', 'Andrea', 'Garcia', 'Miranda', 'Vista Hermosa', 'Nuevo amanecer', '#78', ' 756701259'),
('3004879', 'Fernando', 'Vazquez', 'Garcia', 'Solidaridad', 'Popular', '#469', ' 747592031'),
('57211000099', 'Miguel Angel', 'Morales', 'Esteban', 'Xulchuchio', 'S/C', 'S/N', '7561291886'),
('57221000009', 'Juan Diego', 'Cantor', 'Jimon', 'Barrio de Couyatepec', 'S/N', 'S/N', '7561348232'),
('57221900124', 'Angel', 'Abundes', 'Arteaga', 'Santa Cruz', '11 oriente', 'S/N', ' 756122367'),
('57221900126', 'Jose Manuel', 'Bautista', 'Morales', 'Vicente Guerrero', 'Emiliano Zapata', '#11', '7561270203'),
('57221900128', 'Roberto', 'Chauteco', 'Bello', 'Barrio de San Jose', '9 oriente', '#1611', '7561082039'),
('57221900129', 'Brenda Lizeth', 'Garcia', 'Garcia', 'La Cienega', 'S/N', '#33', '7561172383'),
('57221900130', 'Geovanni', 'Melchor', 'Solano', 'Barrio del Tecolote', '13 sur', '#516', '7561264852'),
('57221900132', 'Saul', 'Nava', 'Luciano', 'Los Sauces', '10 norte', '#403', '7561075555'),
('57221900133', 'Marcos', 'Sanchez', 'del Carmen', 'San Jose', '18 sur', 'S/N', '7561197222'),
('57221900171', 'Francisco', 'Ramirez', 'Martinez', 'Emiliano Zapata', 'Campesino', '#06', '7561176148');


INSERT INTO `autor` (`Id`, `Nombre`, `Paterno`, `Materno`) VALUES
(1, 'Francisco Javier', 'Ceballos', ''),
(2, 'George ', 'Peck', ''),
(3, 'Herbert', 'Schildt', ''),

(4, 'Eric', 'Freeman', ''),
(5, 'Elisabeth', 'Robson', ''),
(6, 'Bert', 'Bates', ''),
(7, 'Kathy', 'Sierra', ''),
(8, 'Jose Maria', 'Vegas', ' Gertrudix'),
(9, 'Silvia Del Carmen', 'Guardati', 'Buemo'),
(10, 'Osvaldo', 'Cairo', 'Battistutti'),
(11, 'Sergio', 'Lujan', 'Mora'),
(12, 'Jose Manuel', 'Fernandez', 'Borroso'),
(13, 'Jose Antonio', 'Fernandez', 'Muriel'),
(14, 'Jose', 'Telledo', 'San Miguel'),
(15, 'Zhamak', 'Dehghani', ''),
(16, 'Italo', 'Morales', 'F'),
(17, 'Luis', 'Joyanes', 'Aguilar'),
(18, 'Andres', 'Lomeña', ''),
(19, 'Ramon', 'Serrano', 'Valero'),
(20, 'Oscar', 'Gonzalez', 'Ortiz'),
(21, 'Martin Elias', 'Villamil', 'Rozo'),
(22, 'Meli', 'Piralla', ''),
(23, 'Jose Mauricio', 'Flores', 'Castillo'),
(24, 'Leonel', 'Yescas', ''),
(25, 'Eugenio', 'Lopez', 'Aldea'),
(26, 'Sebastian', 'Serna', ''),
(27, 'Miguel', 'Perotti', ''),
(28, 'Omar Ivan', 'Trejos', 'Buritica'),
(29, 'Luz Elena', 'Palacio', 'Loaiza'),
(30, 'Daniel', 'Perez', 'Torres'),
(31, 'Jesus', 'Rodriguez', 'Franco'),
(32, 'Alberto I.', 'Pierdant', 'Rodriguez'),
(33, 'Carlos', 'Lopez', ''),
(34, 'Isabel Maria', 'Jimenez', 'Cumbreras'),
(35, 'Guillermo', 'Sampallo', ''),
(36, 'Paolo', 'Aliverti', ''),
(37, 'Jose Dimas', 'Lujan', 'Castillo'),
(38, 'Daniel', 'Lozano', 'Equisoain'),
(39, 'Fernando', 'Cavassa', 'Repetto'),
(40, 'Efrain', 'Oviedo', 'Regino'),
(41, 'Manuel', 'Torres', 'Remon'),
(42, 'Juan', 'Ferrer', 'Martinez'),
(43, 'Roberto', '', ''),
(44, 'Cesar', 'Pardo', ''),
(45, 'Juan David', 'Hincapie', 'Zea'),
(46, 'Anna Maria', 'Lopez', 'Lopez');


INSERT INTO `editorial` (`Id`, `Nombre`) VALUES
(1, 'Alfaomega/Rama'),
(2, 'Mc Graw Hill'),
(3, 'O´Reilly Media'),
(4, 'Ra-Ma'),
(5, 'Alfaomega Grupo Editor'),
(6, 'Tebar Flores'),
(7, 'Rc Libros'),
(8, 'Marcombo'),
(9, 'Paraninfo'),
(10, 'Ecoe Ediciones'),
(11, 'Limusa Noriega '),
(12, 'Altaria Publicaciones'),
(13, 'Ediciones De La U'),
(14, 'Patria'),
(15, 'Garceta Grupo Editorial'),
(16, 'Anaya Multimedia'),
(17, 'Empresa Editora Macro');


INSERT INTO `libros` (`ISBN`, `Titulo`, `editorial_Id`) VALUES
('84-7615-381-3', 'C para expertos', 2),
('970-10-4623-4', 'Crystal Reports', 2),
('970-15-1164-6', 'Java 2 Curso', 1),
('978-0596007126', 'Head First Design Patterns', 3),
('978-970-15-1249-4', 'Java 2 lenguaje', 1),
('9786071514684', 'Fundamentos De Programación', 2),
('9786075380094', 'Android Studio. Aprende A Desarrollar Aplicaciones', 5),
('9786075385600', 'Internet De Las Cosas Con Esp8266', 8),
('9786075385693', 'Unity. Aprende A Desarrollar Videojuegos', 5),
('9786075387314', 'Programación Avanzada Con Php', 7),
('9786075387482', 'Redes Cisco', 7),
('9786075387635', 'Aprender A Programar En Python. De Cero Al Infinit', 5),
('9786075388212', 'Word 2021. Curso Paso A Paso ', 12),
('9786075388236', 'Excel 2021. Curso Paso A Paso', 12),
('9786075388496', 'Php 8. Curso Practico De Formacion', 7),
('9786075388649', 'Consultas: Power Query. El Recurso Máximo Excel 36', 8),
('9786075389233', 'Desarrollo Web (Web Development)', 7),
('9786075389271', 'Diseño De Arquitecturas .Net Orientadas A Microser', 8),
('9786075389295', 'Python Para Filósofos', 8),
('9786075504612', 'Matemáticas Financieras Con Aplicaciones En Excel ', 14),
('9786076224519', 'Estructuras De Datos Basicas. Programacion', 5),
('9786076225950', 'Html & Css. Curso Practico Avanzado', 5),
('9786076226162', 'Tablas Dinamicas. Funciones Tablas Y Bases De Dato', 5),
('9786076229491', 'Java Desde Cero Y Preparate Para Tu Entrevista De ', 5),
('9786123045197', 'Desarrollo De Aplicaciones Con Visual Basic 2015', 17),
('9786123045500', 'Diseño Gráfico', 17),
('9788417289324', 'Fundamentos De Hardware / 2 Ed.', 15),
('9788418551208', 'Java. Curso practico', 4),
('9788418971273', 'Java. 17 Fundamentos practicos de programacion', 4),
('9788426727275', 'Arduino Trucos Y Secretos', 8),
('9788426735546', 'Data Mesh', 8),
('9788428396912', 'Publicacion De Paginas Web', 9),
('9788428397001', 'Acceso A Datos En Aplicaciones Web Del Entorno Ser', 9),
('9788441538382', 'Arduino Practico (Edicion 2017)', 16),
('9788473607773', 'Cálculo De Integrales', 6),
('9788499646138', 'Arduino. Guía Práctica De Fundamentos Y Simulación', 4),
('9788499646152', 'Diseño De Interfaces En Aplicaciones Móviles', 4),
('9788499649191', 'Diseño De Videojuegos.Técnicas Y Ejercicios Prácti', 4),
('9789585030862', 'Fundamentos De Lógica Digital', 10),
('9789585034204', 'Introducción A La Ingeniería', 10),
('9789587627657', 'C++ Soporte Con Qt', 13),
('9789587718355', 'Probabilidad Y Estadística Para Ingenieros', 10),
('9789587922684', 'Lógica De Programación', 13),
('9789681853914', 'Diseño Estructural', 11);

INSERT INTO `libros_autores` (`ISBN`, `autor_Id`) VALUES
('84-7615-381-3', 3),
('978-970-15-1249-4', 1),
('970-10-4623-4', 2),
('970-10-4623-4', 3),
('970-15-1164-6', 1),
('970-15-1164-6', 2),
('970-15-1164-6', 3),
('978-0596007126', 4),
('978-0596007126', 5),
('978-0596007126', 6),
('978-0596007126', 7),
('9788418971273', 8),
('9788418551208', 8),
('9786075387635', 9),
('9786075387635', 10),
('9786076224519', 9),
('9786076225950', 11),
('9788473607773', 12),
('9788473607773', 13),
('9788428397001', 14),
('9788428396912', 14),
('9788426735546', 15),
('9786075389233', 16),
('9786075387314', 16),
('9786075388496', 16),
('9786071514684', 17),
('9786075389295', 18),
('9786075389271', 19),
('9789585034204', 20),
('9789585034204', 21),
('9789681853914', 22),
('9786075388649', 23),
('9786076226162', 23),
('9786075388212', 24),
('9786075388236', 24),
('9788499646138', 25),
('9788499646152', 26),
('9788499649191', 27),
('9789585030862', 28),
('9789587922684', 28),
('9789587718355', 28),
('9789587718355', 29),
('9786075387482', 30),
('9786075504612', 31),
('9786075504612', 32),
('9786075385693', 33),
('9788417289324', 34),
('9786075385600', 35),
('9788426727275', 36),
('9786076229491', 37),
('9786075380094', 37),
('9789681853914', 43),
('9788441538382', 38),
('9786123045500', 39),
('9789587627657', 40),
('9786123045197', 41),
('9788428396912', 42), 
('9788499646152', 44),  
('9789585030862', 45),   
('9786123045500', 46);


INSERT INTO `prestamo` (`Salida`, `Devolucion`, `ISBN`, `ClaveUsu`) VALUES
('2021-09-15', '2021-09-16', '978-970-15-1249-4', '2020001'),
('2021-09-15', '2021-09-17', '970-10-4623-4', '2020002'),
('2021-09-16', '2021-09-17', '970-15-1164-6', '2020003'),
('2021-09-17', '0000-00-00', '84-7615-381-3', '2020001'),
('2021-09-25', '0000-00-00', '978-970-15-1249-4', '260'),
('2023-03-01', '2023-03-03', '9788418971273', '57221900126'),
('2023-03-01', '2023-03-03', '9786076225950', '57221900126'),
('2023-03-03', '2023-03-06', '9788426735546', '57221900126'),
('2023-03-06', '0000-00-00', '9786075388496', '57221900126'),
('2023-03-06', '0000-00-00', '9788441538382', '57221900126'),
('2023-03-01', '2023-03-02', '9786075385693', '57221900171'),
('2023-03-02', '2023-03-03', '9786075388236', '57221900171'),
('2023-03-03', '2023-03-03', '9786075389295', '57221900171'),
('2023-03-02', '2023-03-04', '9788499646138', '57221900129'),
('2023-03-04', '2023-03-06', '9786075388649', '57221900129'),
('2023-03-03', '2023-03-03', '9786075389233', '57221000009'),
('2023-03-03', '0000-00-00', '9786075387314', '57221000009'),
('2023-03-01', '2023-03-06', '9786076225950', '57221900124'),
('2023-03-01', '2023-03-03', '9788418551208', '57221900128'),
('2023-03-03', '2023-03-05', '9786075387635', '57221900128'),
('2023-03-02', '2023-03-02', '9788499646152', '57221900130'),
('2023-03-02', '2023-03-04', '9788499649191', '57221900130'),
('2023-03-04', '2023-03-05', '9789585030862', '57221900130'),
('2023-03-02', '2023-03-04', '9789587718355', '57221900133'),
('2023-03-04', '2023-03-06', '9789587922684', '57221900133'),
('2023-03-06', '2023-03-06', '9786075387482', '57211000099'),
('2023-03-06', '0000-00-00', '9788417289324', '57211000099'),
('2023-03-05', '2023-03-05', '9786075504612', '57221900132'),
('2023-03-05', '2023-03-06', '9786075385600', '57221900132'),
('2023-03-02', '2023-03-02', '9786123045197', '3004871'),
('2023-03-02', '2023-03-04', '9789587627657', '3004871'),
('2023-03-04', '0000-00-00', '9786123045500', '3004871'),
('2023-03-01', '2023-03-04', '9788441538382', '3004872'),
('2023-03-04', '0000-00-00', '9786075380094', '3004872'),
('2023-03-02', '2023-03-02', '9786076229491', '3004873'),
('2023-03-02', '2023-03-04', '9788426727275', '3004873'),
('2023-03-06', '2023-03-07', '978-0596007126', '3004874'),
('2023-03-04', '2023-03-05', '9786076224519', '3004875'),
('2023-03-05', '2023-03-06', '9786075389271', '3004875'),
('2023-03-01', '2023-03-04', '9788473607773', '3004876'),
('2023-03-01', '2023-03-01', '9788428397001', '3004877'),
('2023-03-01', '2023-03-02', '9788428396912', '3004877'),
('2023-03-02', '2023-03-04', '9786071514684', '3004877'),
('2023-03-05', '2023-03-06', '9789681853914', '3004878'),
('2023-03-02', '0000-00-00', '9786071514684', '3004879'),
('2023-03-04', '0000-00-00', '9786075388649', '30048710');


INSERT INTO `user` (`id`, `usuario`, `contraseña`) VALUES
(1, 'Brenda', '1234');
