/* Listado de Operaciones (queries) CRUD de colegio */

/*estudiante*/
	/*Crear estudiante*/
	INSERT INTO estudiante SET documento = '80141995', nombres = 'Gotam', apellidos = 'Batman', curso = 4, acudiente = 'Batichica', direccion = 'calle 3 ciudad Gótica', nacimiento = '1997-08-09', sexo = 'M', status = 1, fecha_ingreso = '2018-01-01', role = 'estu', pass = MD5('password'), imagen  = 'amigo.png';

	/*Actualizar estudiante*/
	UPDATE estudiante SET nombres = 'Gotham', direccion = 'calle 3 # 12 cuidad Gótica', apellidos = 'Bruno Heller', fecha_ingreso = '2018-02-02', pass = MD5('un_nuevo_password')
	WHERE documento = '80141995';

	/*Eliminar estudiante*/
	DELETE FROM estudiante WHERE documento = '80141995';

	/*Buscar Todos los estudiantes*/
	SELECT ms.documento, ms.nombres, ms.apellidos, ms.curso, ms.acudiente, ms.direccion, ms.nacimiento, ms.sexo, ms.status, ms.fecha_ingreso, ms.role, ms.pass, ms.imagen, s.status
	FROM estudiante AS ms
	INNER JOIN status AS s
	ON ms.status = s.status_id;

	/*Buscar un estudiante por documentos, nombres, apellidos */
	SELECT ms.documento, ms.nombres, ms.apellidos, ms.curso, ms.acudiente, ms.direccion, ms.nacimiento, ms.sexo, ms.status, ms.fecha_ingreso, ms.role, ms.pass, ms.imagen, s.status
	FROM movieseries AS ms
	INNER JOIN status AS s
	ON ms.status = s.status_id
	WHERE MATCH(ms.documento, ms.nombres, ms.apellidos)
	AGAINST('80141995' IN BOOLEAN MODE);

	/*Buscar un estudiante por Fecha de ingreso*/
	SELECT ms.documento, ms.nombres, ms.apellidos, ms.curso, ms.acudiente, ms.direccion, ms.nacimiento, ms.sexo, ms.status, ms.fecha_ingreso, ms.role, ms.pass, ms.imagen, s.status
	FROM movieseries AS ms
	INNER JOIN status AS s
	ON ms.status = s.status_id
	WHERE ms.fecha_ingreso BETWEEN '2010-01-01' AND '2017-01-01';

	/*Buscar un estudiante por status*/
	SELECT ms.documento, ms.nombres, ms.apellidos, ms.curso, ms.acudiente, ms.direccion, ms.nacimiento, ms.sexo, ms.status, ms.fecha_ingreso, ms.role, ms.pass, ms.imagen, s.status
	FROM movieseries AS ms
	INNER JOIN status AS s
	ON ms.status = s.status_id
	WHERE ms.status = 1;

/*Funcionario*/
	/*Crear funcionario (documento, nombres, apellidos, direccion, estudios, experiencia, referencias, nacimiento, sexo, status, fecha_ingreso, role, pass, cargo, imagen)*/
	INSERT INTO funcionario SET documento = '80141995', nombres = 'Gotam', apellidos = 'Batman', direccion = 'calle 3 ciudad Gótica', estudios = 'Licenciatura en Filosofía', experiencia = 'Colegios del distrito y colegio de soacha', referencias = 'Mi hermano 3134500665, Mi amigo 3202129641, mi mama 3103352954', nacimiento = '1997-08-09', sexo = 'M', status = 1, fecha_ingreso = '2018-01-01', role = 'profe', pass = MD5('password'), cargo = 'Profesor', imagen  = 'amigo.png';

	/*Actualizar funcionario*/
	UPDATE funcionario SET nombres = 'Gotham', direccion = 'calle 3 # 12 cuidad Gótica', apellidos = 'Bruno Heller', fecha_ingreso = '2018-02-02', pass = MD5('un_nuevo_password')
	WHERE documento = '80141995';

	/*Eliminar funcionario*/
	DELETE FROM funcionario WHERE documento = '80141995';

	/*Buscar Todos los funcionario*/
	SELECT fn.documento, fn.nombres, fn.apellidos, fn.direccion, fn.estudios, fn.experiencia, fn.referencias, fn.nacimiento, fn.sexo, fn.status, fn.fecha_ingreso, fn.role, fn.pass, fn.cargo, fn.imagen, s.status
	FROM funcionario AS fn
	INNER JOIN status AS s
	ON fn.status = s.status_id;

	/*Buscar un funcionario por documentos, nombres, apellidos */
	SELECT fn.documento, fn.nombres, fn.apellidos, fn.direccion, fn.estudios, fn.experiencia, fn.referencias, fn.nacimiento, fn.sexo, fn.status, fn.fecha_ingreso, fn.role, fn.pass, fn.cargo, fn.imagen, s.status
	FROM funcionario AS fn
	INNER JOIN status AS s
	ON fn.status = s.status_id;
	WHERE MATCH(fn.documento, fn.nombres, fn.apellidos)
	AGAINST('80141995' IN BOOLEAN MODE);

	/*Buscar un funcionario por Fecha de ingreso*/
	SELECT fn.documento, fn.nombres, fn.apellidos, fn.direccion, fn.estudios, fn.experiencia, fn.referencias, fn.nacimiento, fn.sexo, fn.status, fn.fecha_ingreso, fn.role, fn.pass, fn.cargo, fn.imagen, s.status
	FROM funcionario AS fn
	INNER JOIN status AS s
	ON fn.status = s.status_id;
	WHERE fn.fecha_ingreso BETWEEN '2010-01-01' AND '2017-01-01';

	/*Buscar un funcionario por status*/
	SELECT fn.documento, fn.nombres, fn.apellidos, fn.direccion, fn.estudios, fn.experiencia, fn.referencias, fn.nacimiento, fn.sexo, fn.status, fn.fecha_ingreso, fn.role, fn.pass, fn.cargo, fn.imagen, s.status
	FROM funcionario AS fn
	INNER JOIN status AS s
	ON fn.status = s.status_id;
	WHERE fn.status = 1;
/*status*/
	/*Crear status*/
	INSERT INTO status SET status_id = 0, status = 'Otro status';

	/*Actualizar status*/
	UPDATE status SET status = 'Other Status' WHERE status_id = 6;

	/*Salvar status*/
	REPLACE INTO status (status_id, status) VALUES (0, 'Otro Status');
	REPLACE status SET status_id = 0, status = 'Otro Status';

	/*Eliminar status*/
	DELETE FROM status WHERE status_id = 6;

	/*Buscar Todos los status*/
	SELECT * FROM status;

	/*Buscar un status por status_id*/
	SELECT * FROM status WHERE status_id = 3;

/*Role*/
	/*Crear role*/
	INSERT INTO role SET role_id = 0, role = 'Otro role';

	/*Actualizar role*/
	UPDATE role SET role = 'Other role' WHERE role_id = 3;

	/*Salvar role*/
	REPLACE INTO role (role_id, role) VALUES (0, 'Otro role');
	REPLACE role SET role_id = 0, role = 'Otro Status';

	/*Eliminar role*/
	DELETE FROM role WHERE role_id = 6;

	/*Buscar Todos los role*/
	SELECT * FROM role;

	/*Buscar un role por role_id*/
	SELECT * FROM role WHERE role_id = 3;

/*Corte*/
	/*Crear corte*/
	INSERT INTO corte SET corte_id = 0, corte = 'Otro corte';

	/*Actualizar corte*/
	UPDATE corte SET corte = 'Other corte' WHERE corte_id = 4;

	/*Salvar corte*/
	REPLACE INTO corte (corte_id, corte) VALUES (0, 'Otro corte');
	REPLACE corte SET corte_id = 0, corte = 'Otro corte';

	/*Eliminar corte*/
	DELETE FROM corte WHERE corte_id = 4;

	/*Buscar Todos los cortes*/
	SELECT * FROM corte;

	/*Buscar un corte por corte_id*/
	SELECT * FROM corte WHERE corte_id = 3;

/*nota*/
	/*Crear nota*/
	INSERT INTO nota SET nota_id = 0, nota = 1.1, concepto = 'calificación más baja';

	/*Actualizar nota*/
	UPDATE nota SET nota = 2.5, concepto 'calificación media' WHERE nota_id = 4;

	/*Salvar nota*/
	REPLACE INTO nota (nota_id, nota, concepto) VALUES (0, 3, 'calificación mínima media');
	REPLACE nota SET nota_id = 0, nota = 3.5, concepto = 'falta más esfuerzo';

	/*Eliminar nota*/
	DELETE FROM nota WHERE nota_id = 6;

	/*Buscar Todos las notas*/
	SELECT * FROM nota;

	/*Buscar un nota por nota_id*/
	SELECT * FROM nota WHERE nota_id = 3;

/*curso*/
	/*Crear curso*/
	INSERT INTO curso SET curso_id = 0, curso = 'Otro curso';

	/*Actualizar curso*/
	UPDATE curso SET curso = 'Other curso' WHERE curso_id = 4;

	/*Salvar curso*/
	REPLACE INTO curso (curso_id, curso) VALUES (0, 'Otro curso');
	REPLACE curso SET curso_id = 0, curso = 'Otro curso';

	/*Eliminar curso*/
	DELETE FROM curso WHERE curso_id = 4;

	/*Buscar Todos los curso*/
	SELECT * FROM curso;

	/*Buscar un curso por curso_id*/
	SELECT * FROM curso WHERE curso_id = 4;

/*Asignatura*/
	/*Crear asignatura*/
	INSERT INTO asignatura SET id_asig = 0, asignatura = 'Otro asignatura';

	/*Actualizar asignatura*/
	UPDATE asignatura SET asignatura = 'Other asignatura' WHERE id_asig  = 6;

	/*Salvar asignatura*/
	REPLACE INTO asignatura (id_asig, asignatura) VALUES (0, 'Otro asignatura');
	REPLACE asignatura SET id_asig = 0, asignatura = 'Otro asignatura';

	/*Eliminar asignatura*/
	DELETE FROM asignatura WHERE id_asig = 6;

	/*Buscar Todos los asignatura*/
	SELECT * FROM asignatura;

	/*Buscar un asignatura por id_asig */
	SELECT * FROM asignatura WHERE id_asig = 3;

/*logro*/
	/*Crear logro*/
	INSERT INTO logro SET id_logro = 0, asignatura = 1, curso = 3, Logro = 'realiza todas las operaciones matemáticas básicas con excelencia';

	REPLACE logro SET id_logro = 1, asignatura = 2, curso = 3, Logro = 'realiza todas las operaciones matemáticas básicas con excelencia';

	/*Actualizar*/
		/*logro*/
		UPDATE logro SET Logro = 'conoce todos los sistemas políticos con excelencia'
			WHERE asignatura = 1 AND curso = 3 AND id_logro = 0;
		
		
	/*Eliminar logro*/
	DELETE FROM logro WHERE id_logro = 1, asignatura = 2, curso = 3;

	/*Buscar Todos los logros*/
	SELECT * FROM logro;

	/*Buscar un logro por:*/
		/*curso*/
		SELECT * FROM logro WHERE curso = 3;
		/*asignatura*/
		SELECT * FROM logro WHERE asginatura = 2;

/*taller*/
	/*Crear taller*/
	INSERT INTO taller SET no_trab = 0, curso = 3, asignatura = 3, corte = 2, trabajo = 'segundo periodo ingles.pdf';

	REPLACE taller SET no_trab = 1, curso = 3, asignatura = 3, corte = 3, trabajo = 'tercer periodo ingles.pdf';

	/*Actualizar*/
		/*taller*/
		UPDATE taller SET trabajo = 'tercer periodo ingles.pdf'
			WHERE asignatura = 1 AND curso = 3 AND corte = 3;
		
		
	/*Eliminar taller*/
	DELETE FROM taller WHERE curso = 3, asignatura = 3, corte = 3;

	/*Buscar Todos los taller*/
	SELECT * FROM taller;

	/*Buscar un taller por:*/
		/*curso*/
		SELECT * FROM taller WHERE curso = 3;
		/*asignatura*/
		SELECT * FROM taller WHERE asginatura = 2;
		/*corte*/
		SELECT * FROM taller WHERE corte = 2;

/*prof_curso_asignatura*/
	/*Crear prof_curso_asignatura*/
	INSERT INTO prof_curso_asignatura SET cusro_asig_id = 0, documento_profe = '80141995', curso = 3, año = '2014', asignatura = 3;

	REPLACE prof_curso_asignatura SET cusro_asig_id = 0, documento_profe = '80141995', curso = 3, año = '2014', asignatura = 3;

	/*Actualizar*/
		/*prof_curso_asignatura*/
		UPDATE prof_curso_asignatura SET asignatura = 4
			WHERE documento_profe = '80141995' AND año = '2014' AND curso = 3;

		UPDATE prof_curso_asignatura SET curso = 4
			WHERE documento_profe = '80141995' AND año = '2014' AND asignatura = 4;
		
		
	/*Eliminar prof_curso_asignatura*/
	DELETE FROM prof_curso_asignatura WHERE documento_profe = '80141995' AND año = '2014' AND asignatura = 4;
	DELETE FROM prof_curso_asignatura WHERE documento_profe = '80141995' AND año = '2014' AND curso= 3;

	/*Buscar Todos los prof_curso_asignatura*/
	SELECT * FROM prof_curso_asignatura;

	/*Buscar un prof_curso_asignatura por:*/
		/*curso*/
		SELECT * FROM prof_curso_asignatura WHERE curso = 3;
		/*asignatura*/
		SELECT * FROM prof_curso_asignatura WHERE asginatura = 2;
		/*año*/
		SELECT * FROM prof_curso_asignatura WHERE año = '2014';
		/*profesor*/
		SELECT * FROM prof_curso_asignatura WHERE documento_profe = '80141995';



/*notas_estudiante*/
	/*Crear notas_estudiante*/
	INSERT INTO notas_estudiante SET notaestu_id = 0, documento_estu = '80141995', año = '2014', corte = 2, logro = 3, nota = 9;

	REPLACE notas_estudiante SET notaestu_id = 0, documento_estu = '80141995', año = '2014', corte = 2, logro = 3, nota = 9;

	/*Actualizar*/
		/*notas_estudiante*/
		UPDATE notas_estudiante SET nota = 7;
			WHERE documento_estu = '80141995' AND año = '2014' AND logro = 3;

		UPDATE notas_estudiante SET nota = 4;
			WHERE documento_estu = '80141995' AND año = '2014' AND logro = 4 AND corte = 2;
		
		
	/*Eliminar notas_estudiante*/
	DELETE FROM notas_estudiante WHERE documento_estu = '80141995' AND año = '2014' AND logro = 3;
	DELETE FROM notas_estudiante WHERE documento_estu = '80141995' AND año = '2014' AND corte = 2;

	/*Buscar Todos los notas_estudiante*/
	SELECT * FROM notas_estudiante;

	/*Buscar un notas_estudiante por:*/
		/*logro*/
		SELECT * FROM notas_estudiante WHERE logro = 3;
		/*corte*/
		SELECT * FROM notas_estudiante WHERE corte = 2;
		/*año*/
		SELECT * FROM notas_estudiante WHERE año = '2014';
		/*estudiante*/
		SELECT * FROM notas_estudiante WHERE documento_estu = '80141995';


/*definitiva*/
	/*Crear definitiva*/
	INSERT INTO definitiva SET id_definitiva = 0, documento_estu = '80141995', año = '2014', defi_corte1 = 4.0, defi_año = 3.9;

	REPLACE definitiva SET id_definitiva = 0, documento_estu = '80141995', año = '2014', defi_corte1 = 4.0, defi_año = 3.9;

	/*Actualizar*/
		/*definitiva*/
		UPDATE definitiva SET defi_corte1 = 4.2, defi_año = 4.2;
			WHERE documento_estu = '80141995' AND año = '2014';
		
		
	/*Eliminar notas_estudiante*/
	DELETE FROM definitiva WHERE documento_estu = '80141995' AND año = '2014';
	DELETE FROM definitiva WHERE documento_estu = '80141995' AND año = '2014';

	/*Buscar Todos los definitiva*/
	SELECT * FROM definitiva;

	/*Buscar un definitiva por:*/
		/*corte*/
		SELECT * FROM definitiva WHERE año = '2014';
		/*profesor*/
		SELECT * FROM definitiva WHERE documento_estu = '80141995';


		SELECT * FROM funcionario AS fn INNER JOIN estudiante AS st ON fn.status = st.status WHERE (fn.documento = '$user' OR fn.documento = '$user') AND (fn.pass = MD5('$pass') OR fn.pass = MD5('$pass'))";