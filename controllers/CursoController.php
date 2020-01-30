<?php 
class CursoController {
	private $model;

	public function __construct() {
		$this->model = new CursoModel();
	}

	public function set( $curso_data = array() ) {
		return $this->model->set($curso_data);
	}

	public function get( $curso_id = '' ) {
		return $this->model->get($curso_id);
	}

	public function del( $curso_id = '' ) {
		return $this->model->del($curso_id);
	}

	public function __destruct() {
		$this;
	}
}