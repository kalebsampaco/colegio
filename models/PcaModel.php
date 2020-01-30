<?php 
class PcaModel extends Model {
	public function set( $pca_data = array() ) {
		foreach ($pca_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO prof_curso_asignatura (curso_asig_id, documento_profe, curso, fecha, asignatura) VALUES ($id, $profe, $curso, '$fecha', $asig)";
		$this->set_query();
	}

	public function get( $pca_id = '') {
		$this->query = ($pca_id != '')
			?"SELECT * FROM (prof_curso_asignatura as pca 
			LEFT JOIN curso as cr
			ON pca.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON pca.asignatura = sg.id_asig 
			WHERE pca.curso_asig_id = $pca_id"
			:"SELECT * FROM (prof_curso_asignatura as pca 
			LEFT JOIN curso as cr ON pca.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON pca.asignatura = sg.id_asig ";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function getdoc( $doc_id = '') {
		$this->query = ($doc_id != '')
			?"SELECT * FROM (prof_curso_asignatura as pca 
			LEFT JOIN curso as cr 
			ON pca.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON pca.asignatura = sg.id_asig 
			WHERE pca.documento_profe = $doc_id"
			:"SELECT * FROM (prof_curso_asignatura as pca 
			LEFT JOIN curso as cr 
			ON pca.curso = cr.curso_id)
			LEFT JOIN asignatura as sg
			ON pca.asignatura = sg.id_asig ";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $pca_id = '' ) {
		$this->query = "DELETE FROM prof_curso_asignatura WHERE curso_asig_id = $pca_id";
		$this->set_query();
	}

	public function __destruct() {
		$this;
	}
}