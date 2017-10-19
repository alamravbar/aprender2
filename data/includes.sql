INSERT INTO `Categoria`(`nombre`) VALUES ("Matemática"),("Lengua"),("Ingles"),("Química"),("Física")
INSERT INTO `Etiqueta`(`nombre`) VALUES ("Matemática_I"), ("Lengua_I"), ("Ingles_II"), ("Química_Inorgaica"), ("Programación")
INSERT INTO `Persona`(`dni_persona`, `nombre`, `apellido`) VALUES ('11111111','docente','aprender')
INSERT INTO `Docente` (`dni_persona`, `cuil`, `habilitado`, `cert_serv`) VALUES ('11111111', '2147483647', '1', '1')
INSERT INTO `Documento`( `nombre`, `ruta`, `extension`, `descripcion`, `id_categoria`) VALUES
("a","files/a.jpg","jpg","foto",1),
("algebra de boole","files/algebra de boole.pdf","pdf","algebra de book es ...",2),
("dibujo","files/dibujo.pdf","pdf","dibujo de un unicornio",1),
("horarios","files/horarios.pdf","pdf","horarios de cursado",3)
ALTER TABLE Carga ADD fecha_creacion date;
INSERT INTO `Carga` (`dni_docente`, `id_documento`, `fecha_creacion`) VALUES
(11111111, 1, '2017-10-17'),
(11111111, 2, '2017-10-18'),
(11111111, 3, '2017-10-17'),
(11111111, 4, '2017-10-15');
