<?php 
class CortesController {
	private $model;

	public function __construct() {
		$this->model = new CortesModel();
	}

	public function set( $corte_data = array() ) {
		return $this->model->set($corte_data);
	}

	public function get( $corte_id = '' ) {
		return $this->model->get($corte_id);
	}

	public function del( $corte_id = '' ) {
		return $this->model->del($corte_id);
	}

	public function __destruct() {
		$this;
	}
}