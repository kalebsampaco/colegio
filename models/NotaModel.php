<?php 
class NotaModel extends Model {
	public function set( $nota_data = array() ) {
		foreach ($nota_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO nota (nota_id, nota, concepto) VALUES ($nota_id, $nota, '$concepto')";
		$this->set_query();
	}

	public function get( $nota_id = '') {
		$this->query = ($nota_id != '')
			?"SELECT * FROM nota WHERE nota_id = $nota_id"
			:"SELECT * FROM nota";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $nota_id = '' ) {
		$this->query = "DELETE FROM nota WHERE nota_id = $nota_id";
		$this->set_query();
	}

	public function __destruct() {
		$this;
	}
}