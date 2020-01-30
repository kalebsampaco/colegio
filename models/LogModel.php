<?php 
class LogModel extends Model {
	public function set( $log_data = array() ) {
		foreach ($log_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO logro (id_logro, asignatura, curso, logro, corte, documento_profe) VALUES ($id_logro, $asig, $curso, '$logro', $corte '$documento')";
		$this->set_query();
	}

	public function get( $log_id = '') {
		$this->query = ($log_id != '')
			?"SELECT * FROM (logro as log LEFT JOIN curso as cr ON log.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON log.asignatura = sg.id_asig WHERE documento_profe = $log_id"
			:"SELECT * FROM (logro as log LEFT JOIN curso as cr ON log.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON log.asignatura = sg.id_asig ";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function getcurso( $curso_id = '') {
		$this->query = ($curso_id != '')
			?"SELECT * FROM (logro as log 
			LEFT JOIN curso as cr 
			ON log.curso = cr.curso_id)
			WHERE cr.curso = '$curso_id'"
			:"SELECT * FROM (logro as log 
			LEFT JOIN curso as cr 
			ON log.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON log.asignatura = sg.id_asig";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function getcorte( $corte_id = '') {
		$this->query = ($corte_id != '')
			?"SELECT * FROM (logro as log 
			LEFT JOIN curso as cr 
			ON log.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON log.asignatura = sg.id_asig
			LEFT JOIN corte as ct
			ON log.corte = ct.corte_id
			WHERE log.corte = $corte_id"
			:"SELECT * FROM (logro as log 
			LEFT JOIN curso as cr 
			ON log.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON log.asignatura = sg.id_asig ";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function getl( $logro_id = '') {
		$this->query = ($logro_id != '')
			?"SELECT * FROM logro WHERE id_logro = $logro_id"
			:"SELECT * FROM logro";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $log_id = '' ) {
		$this->query = "DELETE FROM logro WHERE id_logro = $log_id";
		$this->set_query();
	}

	public function __destruct() {
		$this;
	}
}