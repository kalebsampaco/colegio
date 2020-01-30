<?php 
class CortesModel extends Model {
	public function set( $corte_data = array() ) {
		foreach ($corte_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO corte (corte_id, corte) VALUES ($corte_id, '$corte')";
		$this->set_query();
	}

	public function get( $corte_id = '') {
		$this->query = ($corte_id != '')
			?"SELECT * FROM corte WHERE corte_id = $corte_id"
			:"SELECT * FROM corte";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $corte_id = '' ) {
		$this->query = "DELETE FROM corte WHERE corte_id = $corte_id";
		$this->set_query();
	}

	public function __destruct() {
		$this;
	}
}