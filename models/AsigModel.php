<?php 
class AsigModel extends Model {
	public function set( $asig_data = array() ) {
		foreach ($asig_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO asignatura (id_asig, asignatura) VALUES ($id_asig, '$asignatura')";
		$this->set_query();
	}

	public function get( $id_asig = '') {
		$this->query = ($id_asig != '')
			?"SELECT * FROM asignatura WHERE id_asig = $id_asig"
			:"SELECT * FROM asignatura";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $id_asig = '' ) {
		$this->query = "DELETE FROM asignatura WHERE id_asig = $id_asig";
		$this->set_query();
	}

	public function __destruct() {
		$this;
	}
}