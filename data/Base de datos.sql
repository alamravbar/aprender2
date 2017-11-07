create table Rol(
  id_rol int(20) NOT NULL AUTO_INCREMENT,
  rol varchar(30),
  PRIMARY KEY(id_rol)
);
create table Titulo(
  id_titulo int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(50),
  descripcion varchar(500),
  PRIMARY KEY(id_titulo)
);
create table Nivel(
  id_nivel int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(50),
  descripcion varchar(500),
  PRIMARY KEY(id_nivel)
);
create table Etiqueta(
  id_etiqueta int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(50),
  PRIMARY KEY(id_etiqueta)
);
create table Categoria(
  id_categoria int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(50),
  PRIMARY KEY(id_categoria)
);

create table Persona(
  id_persona int(8) NOT NULL AUTO_INCREMENT,
  nombre varchar(50),
  apellido varchar(50),
  fecha_nac date,
  PRIMARY KEY (id_persona)
);

create table Usuario(
  id_usuario int(20) NOT NULL AUTO_INCREMENT,
  mail varchar(50) NOT NULL,
  nombre varchar(50),
  psw varchar(50),
  habilitado int(1),
  id_rol int(20) NOT NULL,
  id_persona int(8) NOT NULL,
  PRIMARY KEY (id_usuario),
  FOREIGN KEY (id_rol) REFERENCES Rol(id_rol),
  FOREIGN KEY (id_persona) REFERENCES Persona(id_persona)
);
create table Docente(
  id_persona int(8) NOT NULL,
  cuil int(11),
  habilitado int(1) NOT NULL,
  cert_serv int(1) NOT NULL,
  PRIMARY KEY (id_persona),
  FOREIGN KEY (id_persona) REFERENCES Persona(id_persona)
);
create table Alumno(
  id_persona int(8) NOT NULL,
  PRIMARY KEY (id_persona),
  FOREIGN KEY (id_persona) REFERENCES Persona(id_persona)
);
create table Asignatura(
  id_asignatura int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL,
  descripcion varchar(500),
  id_nivel int(20) NOT NULL,
  PRIMARY KEY (id_asignatura),
  FOREIGN KEY (id_nivel) REFERENCES Nivel(id_nivel)
);
create table Curso(
  id_curso int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL,
  link varchar(50),
  id_asignatura int(20) NOT NULL,
  PRIMARY KEY (id_curso),
  FOREIGN KEY (id_asignatura) REFERENCES Asignatura(id_asignatura)
);

create table Documento(
  id_documento int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(30) NOT NULL,
  ruta varchar(30),
  extension varchar(30),
  descripcion varchar(500),
  habilitado int(1),
  id_categoria int(20) NOT NULL,
  PRIMARY KEY (id_documento),
  FOREIGN KEY (id_categoria) REFERENCES Categoria(id_categoria)
);

create table Obtuvo(
  id_titulo int(20) NOT NULL,
  dni_docente int(8) NOT NULL,
  anio_obtension int(4) NOT NULL,
  PRIMARY KEY (id_titulo,dni_docente),
  FOREIGN KEY (id_titulo) REFERENCES Titulo(id_titulo),
  FOREIGN KEY (dni_docente) REFERENCES Docente(id_persona)
);
create table Participa(
  dni_alumno int(8) NOT NULL,
  id_curso int(20) NOT NULL,
  f_inicio date,
  f_fin date,
  PRIMARY KEY (dni_alumno, id_curso),
  FOREIGN KEY (dni_alumno) REFERENCES Alumno(id_persona),
  FOREIGN KEY (id_curso) REFERENCES Curso(id_curso)
);
create table Dicta(
  id_curso int(20) NOT NULL,
  dni_docente int(8) NOT NULL,
  PRIMARY KEY(id_curso,dni_docente),
  FOREIGN KEY (id_curso) REFERENCES Curso(id_curso),
  FOREIGN KEY (dni_docente) REFERENCES Docente(id_persona)
);

create table Contiene(
  id_documento int(20) NOT NULL,
  id_etiqueta int(20) NOT NULL,
  PRIMARY KEY(id_documento,id_etiqueta),
  FOREIGN KEY (id_documento) REFERENCES Documento(id_documento),
  FOREIGN KEY (id_etiqueta) REFERENCES Etiqueta(id_etiqueta)
);

create table Carga(
  id_docente int(8) NOT NULL,
  id_documento int(20) NOT NULL,
  PRIMARY KEY(id_docente,id_documento),
  FOREIGN KEY (id_docente) REFERENCES Docente(id_persona),
  FOREIGN KEY (id_documento) REFERENCES Documento(id_documento)
);
