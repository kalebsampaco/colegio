<?php 
class TController {
	private $model;

	public function __construct() {
		$this->model = new TModel();
	}

	public function set( $taller_data = array() ) {
		return $this->model->set($taller_data);
	}

	public function get( $taller_id = '' ) {
		return $this->model->get($taller_id);
	}

	public function getl( $taller_id = '' ) {
		return $this->model->getl($taller_id);
	}

	public function del( $taller_id = '' ) {
		return $this->model->del($taller_id);
	}

	public function __destruct() {
		$this;
	}
}