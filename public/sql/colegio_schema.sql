
DROP DATABASE IF EXISTS colegio;

CREATE DATABASE IF NOT EXISTS colegio;

USE colegio;

/*Tabla Catálogo*/
CREATE TABLE cargo(
	cargo_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	cargo VARCHAR(20) NOT NULL
);

CREATE TABLE status(
	status_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	status VARCHAR(20) NOT NULL
);

CREATE TABLE role(
	role_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	role VARCHAR(10) NOT NULL
);

CREATE TABLE corte(
	corte_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	corte VARCHAR(50) NOT NULL
);

CREATE TABLE nota(
	nota_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	nota FLOAT(2,2) NOT NULL,
	concepto VARCHAR(50) NOT NULL
);

CREATE TABLE curso(
	curso_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	curso VARCHAR(5) NOT NULL
);

CREATE TABLE asignatura(
	id_asig INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	asignatura VARCHAR(15) NOT NULL
);

/*Tabla de Datos*/
/*CREATE TABLE estudiante(
	documento VARCHAR(50) PRIMARY KEY,
	nombres VARCHAR(50) NOT NULL,
	apellidos VARCHAR(50) NOT NULL,
	curso  INTEGER UNSIGNED NOT NULL,
	acudiente VARCHAR(100) DEFAULT 'Pendiente',
	direccion VARCHAR(100) DEFAULT 'Pendiente',
	nacimiento DATE NOT NULL,
	sexo CHAR(1) NOT NULL,
	status INTEGER UNSIGNED NOT NULL,
	fecha_ingreso DATE NOT NULL,
	role  INTEGER UNSIGNED NOT NULL,
	pass CHAR(32) NOT NULL,
	imagen VARCHAR(50),
	FULLTEXT KEY search(documento, nombres, apellidos),
	FOREIGN KEY (status) REFERENCES status(status_id),
	FOREIGN KEY (curso) REFERENCES curso(curso_id),
	FOREIGN KEY (role) REFERENCES role(role_id)
		ON DELETE RESTRICT
);*/

CREATE TABLE funcionario(
	documento VARCHAR(50) PRIMARY KEY,
	nombres VARCHAR(50) NOT NULL,
	apellidos VARCHAR(50) NOT NULL,
	curso  INTEGER UNSIGNED NOT NULL,
	acudiente VARCHAR(100) DEFAULT 'Pendiente',
	direccion VARCHAR(100) DEFAULT 'Pendiente',
	estudios  VARCHAR(100) DEFAULT 'Pendiente',
	experiencia VARCHAR(100) DEFAULT 'Pendiente',
	Referencias VARCHAR(100) DEFAULT 'Pendiente',
	nacimiento DATE NOT NULL,
	sexo CHAR(1) NOT NULL,
	status INTEGER UNSIGNED NOT NULL,
	fecha_ingreso DATE NOT NULL,
	role INTEGER UNSIGNED NOT NULL,
	pass CHAR(32) NOT NULL,
	cargo VARCHAR(20) NOT NULL,
	imagen VARCHAR(50) DEFAULT 'Pendiente',
	FULLTEXT KEY search(documento, nombres, apellidos, cargo),
	FOREIGN KEY (status) REFERENCES status(status_id),
	FOREIGN KEY (role) REFERENCES role(role_id) 
		ON DELETE RESTRICT
);

CREATE TABLE logro(
	id_logro INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	asignatura INTEGER UNSIGNED NOT NULL,
	curso INTEGER UNSIGNED NOT NULL,
	logro VARCHAR(200) NOT NULL,
	FOREIGN KEY (curso) REFERENCES curso(curso_id) ,
	FOREIGN KEY (asignatura) REFERENCES asignatura(id_asig)
		ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE taller(
	no_trab INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	curso INTEGER UNSIGNED NOT NULL,
	asignatura INTEGER UNSIGNED NOT NULL,
	corte INTEGER UNSIGNED NOT NULL,
	trabajo VARCHAR(50),
	FOREIGN KEY (curso) REFERENCES curso(curso_id),
	FOREIGN KEY (asignatura) REFERENCES asignatura(id_asig),
	FOREIGN KEY (corte) REFERENCES corte(corte_id)
		ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE prof_curso_asignatura(
	curso_asig_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	documento_profe VARCHAR(50) NOT NULL,
	curso INTEGER UNSIGNED NOT NULL,
	año YEAR(4) NOT NULL,
	asignatura INTEGER UNSIGNED NOT NULL,
	FOREIGN KEY (curso) REFERENCES curso(curso_id),
	FOREIGN KEY (asignatura) REFERENCES asignatura(id_asig),
	FOREIGN KEY (documento_profe) REFERENCES funcionario(documento)
		ON DELETE RESTRICT ON UPDATE CASCADE
);



CREATE TABLE notas_estudiante(
	notaestu_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	documento_estu VARCHAR(50) NOT NULL,
	año YEAR(4) NOT NULL,
	corte  INTEGER UNSIGNED NOT NULL,
	logro  INTEGER UNSIGNED NOT NULL,
	nota INTEGER UNSIGNED NOT NULL,
	FOREIGN KEY (documento_estu) REFERENCES funcionario(documento),
	FOREIGN KEY (corte) REFERENCES corte(corte_id),
	FOREIGN KEY (logro) REFERENCES logro(id_logro),
	FOREIGN KEY (nota) REFERENCES nota(nota_id)
		ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE definitiva(
	id_definitiva INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	documento_estu VARCHAR(50) NOT NULL,
	año YEAR(4) NOT NULL,
	defi_corte1 FLOAT(2,2) DEFAULT 0.0,
	defi_corte2 FLOAT(2,2) DEFAULT 0.0,
	defi_corte3 FLOAT(2,2) DEFAULT 0.0,
	defi_corte4 FLOAT(2,2) DEFAULT 0.0,
	defi_año FLOAT(2,2) DEFAULT 0.0,
	FOREIGN KEY (documento_estu) REFERENCES funcionario(documento)
		ON DELETE RESTRICT
);

INSERT INTO status (status_id, status) VALUES
	(1, 'Activo'),
	(2, 'Inactivo'),
	(3, 'cambio de curso'),
	(4, 'Cambio colegio'),
	(5, 'Matricula cancelada');

INSERT INTO role (role_id, role) VALUES
	(1, 'admin'),
	(2, 'oper'),
	(3, 'profe'),
	(4, 'estu');

INSERT INTO cargo (cargo_id, cargo) VALUES
	(1, 'admin'),
	(2, 'oper'),
	(3, 'profe'),
	(4, 'estu');

INSERT INTO funcionario (documento, nombres, apellidos, curso, acudiente, direccion, estudios, experiencia, referencias, nacimiento, sexo, status, fecha_ingreso, role, pass, cargo, imagen) VALUES
	('80141995', 'William Caleb', 'Saenz Camacho', 0, '', 'Cll 70 c sur # 80 I 58', 'Licenciado en Filosofía y Educación religiosa', '', '', '1983-11-10', 'M', 1, '2017-02-10', 1, MD5('80141995'), 'admin', 'amigo.png' ),
	('80141996', 'William', 'Saenz', 0, '', 'Cll 70 c sur # 80 I 58', 'Licenciado en Filosofía y Educación religiosa', '', '', '1983-11-10', 'M', 1, '2017-02-10', 2, MD5('80141996'), 'oper', 'amigo.png' ),
	('80141997', 'Caleb', 'Camacho', 0, '', 'Cll 70 c sur # 80 I 58', 'Licenciado en Filosofía y Educación religiosa', '', '', '1983-11-10', 'M', 1, '2017-02-10', 3, MD5('80141997'), 'profe', 'amigo.png' );
