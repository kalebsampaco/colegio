<?php 
class UsersModel extends Model {

	public function set( $user_data = array() ) {
		foreach ($user_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO funcionario (documento, nombres, apellidos, curso, acudiente, direccion, estudios, experiencia, referencias, nacimiento, sexo, status, fecha_ingreso, role, pass, cargo, imagen) VALUES ('$documento', '$nombres', '$apellidos', '$curso', '$acudiente', '$direccion', '$estudios', '$experiencia', '$referencias', '$nacimiento', '$sexo', '$status', '$fecha_ingreso', '$role', MD5('$pass'), '$cargo', '$imagen')";
		$this->set_query();

		
	}

	public function get( $user = '' ) {
		$this->query = ($user != '')
			?"SELECT * FROM funcionario as fn LEFT JOIN curso as cr
			ON fn.curso = cr.curso_id WHERE  documento = '$user'" 
			:"SELECT * FROM funcionario as fn LEFT JOIN curso as cr
			ON fn.curso = cr.curso_id";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}
	public function getcurso( $curso = '' ) {
		$this->query = ($curso != '')
			?"SELECT * FROM funcionario as fn LEFT JOIN curso as cr
			ON fn.curso = cr.curso_id WHERE  fn.curso = '$curso'" 
			:"SELECT * FROM funcionario as fn LEFT JOIN curso as cr
			ON fn.curso = cr.curso_id";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function del( $user = '' ) {
		$this->query = "DELETE FROM funcionario WHERE documento = '$user'";
		$this->set_query();

	}

	public function validate_user($user, $pass) {
		$this->query ="SELECT fn.documento, fn.nombres, fn.apellidos, fn.curso, fn.acudiente, fn.direccion, fn.estudios, fn.experiencia, fn.referencias, fn.nacimiento, fn.sexo, fn.status, fn.fecha_ingreso, fn.role, fn.pass, fn.cargo, fn.imagen, s.status, cr.curso, cg.cargo
			FROM (funcionario AS fn
			INNER JOIN status AS s
			ON fn.status = s.status_id)
			LEFT JOIN curso as cr
			ON fn.curso = cr.curso_id
			LEFT JOIN cargo as cg
			ON fn.cargo = cg.cargo_id
			WHERE fn.documento = '$user' AND fn.pass = MD5('$pass')";

		$this->get_query();

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function __destruct() {
		$this;
	}
}