CREATE USER 'ajaxbd'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';

GRANT USAGE ON *.* TO 'ajaxbd'@'localhost' 
	REQUIRE NONE WITH 
		MAX_QUERIES_PER_HOUR 0 	
		MAX_CONNECTIONS_PER_HOUR 0 
		MAX_UPDATES_PER_HOUR 0 
		MAX_USER_CONNECTIONS 0;
		
CREATE DATABASE IF NOT EXISTS `ajaxbd`;
GRANT ALL PRIVILEGES ON `ajaxbd`.* TO 'ajaxbd'@'localhost';

/*_____________________________________________________________*/

CREATE TABLE usuarios(
	id INT(6) AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(100),
	apellidos VARCHAR(100),
	user VARCHAR(20) NOT NULL UNIQUE,
	pass VARCHAR(100) NOT NULL,
	correo VARCHAR(100) NOT NULL UNIQUE,
	CONSTRAINT pk_usuarios PRIMARY KEY(id)
)ENGINE=InnoDb
CHARACTER SET latin1
COLLATE latin1_spanish_ci;

/*_____________________________________________________________*/

CREATE TABLE temas(
id INT(6) AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(100),
	titulo VARCHAR(100),
	texto VARCHAR(1000),
	id_usuario INT(6) NOT NULL,
	CONSTRAINT pk_temas PRIMARY KEY(id),
	CONSTRAINT fk_temas_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
)ENGINE=InnoDb
CHARACTER SET latin1
COLLATE latin1_spanish_ci;

/*_____________________________________________________________*/