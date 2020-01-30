<?php 
class CargoController {
	private $model;

	public function __construct() {
		$this->model = new CargoModel();
	}

	public function set( $cargo_data = array() ) {
		return $this->model->set($cargo_data);
	}

	public function get( $cargo_id = '' ) {
		return $this->model->get($cargo_id);
	}

	public function del( $cargo_id = '' ) {
		return $this->model->del($cargo_id);
	}

	public function __destruct() {
		$this;
	}
}