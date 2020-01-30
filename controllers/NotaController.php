<?php 
class NotaController {
	private $model;

	public function __construct() {
		$this->model = new NotaModel();
	}

	public function set( $nota_data = array() ) {
		return $this->model->set($nota_data);
	}

	public function get( $nota_id = '' ) {
		return $this->model->get($nota_id);
	}

	public function del( $nota_id = '' ) {
		return $this->model->del($nota_id);
	}

	public function __destruct() {
		$this;
	}
}