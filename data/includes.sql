INSERT INTO `Categoria`(`nombre`) VALUES ("Matemática"),("Lengua"),("Ingles"),("Química"),("Física");
INSERT INTO `Etiqueta`(`nombre`) VALUES ("Matemática_I"), ("Lengua_I"), ("Ingles_II"), ("Química_Inorgaica"), ("Programación");
INSERT INTO `Persona`(`id_persona`, `nombre`, `apellido`) VALUES ('1','docente','aprender');
INSERT INTO `Docente` (`id_persona`, `cuil`, `habilitado`, `cert_serv`) VALUES ('1', '2147483647', '1', '1');
INSERT INTO `Documento`( `nombre`, `ruta`, `extension`, `descripcion`, `id_categoria`) VALUES
("a","files/a.jpg","jpg","foto",1),
("algebra de boole","files/algebra de boole.pdf","pdf","algebra de book es ...",2),
("dibujo","files/dibujo.pdf","pdf","dibujo de un unicornio",1),
("horarios","files/horarios.pdf","pdf","horarios de cursado",3);
ALTER TABLE Carga ADD fecha_creacion date;
INSERT INTO `Carga` (`id_docente`, `id_documento`, `fecha_creacion`) VALUES
(1, 1, '2017-10-17'),
(1, 2, '2017-10-18'),
(1, 3, '2017-10-17'),
(1, 4, '2017-10-15');
INSERT INTO `Rol`(`rol`) VALUES ("alumno"), ("docente"), ("moderador"),("administrador")
//Agregue 24-10 esto:
/* Agregado en la Base de Datos.sql
ALTER TABLE Persona ADD fecha_nac date;
ALTER TABLE Usuario ADD habilitado int(1);
ALTER TABLE Docuento ADD habilitado int(1);*/
//Agregue 12-11 esto:
ALTER TABLE Usuario ADD fecha_creacion date; //Para ordenarlo segun la fecha que se lo creo

AGREGUE 13-11 esto:
INSERT INTO `Persona`(`nombre`, `apellido`, `fecha_nac`) VALUES ('alam','ravbar','1991-07-27')
INSERT INTO `Usuario`(`mail`, `nombre`, `psw`, `habilitado`, `id_rol`, `id_persona`, `fecha_creacion`) VALUES
('alam.ravbar@gmail.com','alamb','coquito',1,4,2,'2017-11-13');
ALTER TABLE Persona ADD genero varchar(1);  //ingresar m para masculino f para femenino

// 14 de noviembre
//elimine y agregue de nuevo la tabla Obtuvo
create table Obtuvo(
  id_titulo int(20) NOT NULL,
  id_docente int(8) NOT NULL,
  anio_obtension int(4) NOT NULL,
  PRIMARY KEY (id_titulo,id_docente),
  FOREIGN KEY (id_titulo) REFERENCES Titulo(id_titulo),
  FOREIGN KEY (id_docente) REFERENCES Docente(id_persona)
);
