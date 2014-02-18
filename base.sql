CREATE DATABASE batman CHARACTER SET utf8 COLLATE utf8_spanish2_ci;

CREATE TABLE batman.personaje(
	id tinyint(3) unsigned not null auto_increment primary key,
	nombre varchar(255) not null,
	descripcion text not null
);