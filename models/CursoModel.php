<?php 
class CursoModel extends Model {
	public function set( $curso_data = array() ) {
		foreach ($curso_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO curso (curso_id, curso) VALUES ($curso_id, '$curso')";
		$this->set_query();
	}

	public function get( $curso_id = '') {
		$this->query = ($curso_id != '')
			?"SELECT * FROM curso WHERE curso_id = $curso_id"
			:"SELECT * FROM curso";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $curso_id = '' ) {
		$this->query = "DELETE FROM curso WHERE curso_id = $curso_id";
		$this->set_query();
	}

	public function __destruct() {
		$this;
	}
}