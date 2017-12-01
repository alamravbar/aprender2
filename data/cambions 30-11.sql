//Cambio de documento:
ALTER TABLE `documento` CHANGE `habilitado` `estado` INT(1) NULL DEFAULT NULL;

//tabla observación
create table observacion(
id int(20) NOT NULL AUTO_INCREMENT,
descripcion varchar(5000),
fecha Date,
PRIMARY KEY (id)
)

create table presenta(
id_documento int(20),
id_observacion int(20),
PRIMARY KEY(id_documento, id_observacion),
FOREIGN KEY (id_documento) REFERENCES documento(id_documento),
FOREIGN KEY (id_observacion) REFERENCES observacion(id)
)
