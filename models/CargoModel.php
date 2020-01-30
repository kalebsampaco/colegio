<?php 
class CargoModel extends Model {
	public function set( $cargo_data = array() ) {
		foreach ($cargo_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO cargo (cargo_id, cargo) VALUES ($cargo_id, '$cargo')";
		$this->set_query();
	}

	public function get( $cargo_id = '') {
		$this->query = ($cargo_id != '')
			?"SELECT * FROM cargo WHERE cargo_id = $cargo_id"
			:"SELECT * FROM cargo";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $cargo_id = '' ) {
		$this->query = "DELETE FROM cargo WHERE cargo_id = $cargo_id";
		$this->set_query();
	}

	public function __destruct() {
		$this;
	}
}