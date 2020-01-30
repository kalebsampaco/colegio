<?php 
class TModel extends Model {
	public function set( $taller_data = array() ) {
		foreach ($taller_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO taller (no_trab, curso, asignatura, corte, trabajo, documento) VALUES ($no_trab, $curso, $asig, $corte, '$trabajo', '$documento')";
		$this->set_query();
	}

	public function get( $taller_id = '') {
		$this->query = ($taller_id != '')
			?"SELECT * FROM (taller as tr LEFT JOIN curso as cr ON tr.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON tr.asignatura = sg.id_asig WHERE documento = $taller_id"
			:"SELECT * FROM (taller as tr LEFT JOIN curso as cr ON tr.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON tr.asignatura = sg.id_asig ";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function getl( $taller_id = '') {
		$this->query = ($taller_id != '')
			?"SELECT * FROM taller WHERE no_trab = $taller_id"
			:"SELECT * FROM taller";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $taller_id = '' ) {
		$this->query = "DELETE FROM taller WHERE no_trab = $taller_id";
		$this->set_query();
	}

	public function __destruct() {
		$this;
	}
}