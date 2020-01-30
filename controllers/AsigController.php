<?php 
class AsigController {
	private $model;

	public function __construct() {
		$this->model = new AsigModel();
	}

	public function set( $asig_data = array() ) {
		return $this->model->set($asig_data);
	}

	public function get( $id_asig = '' ) {
		return $this->model->get($id_asig);
	}

	public function del( $id_asig = '' ) {
		return $this->model->del($id_asig);
	}

	public function __destruct() {
		$this;
	}
}