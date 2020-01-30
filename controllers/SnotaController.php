<?php 
class SnotaController {
	private $model;

	public function __construct() {
		$this->model = new SnotaModel();
	}

	public function set( $nota_data = array() ) {
		return $this->model->set($nota_data);
	}

	public function get( $nota_id = '' ) {
		return $this->model->get($nota_id);
	}

	public function getdoc( $doc_id = '' ) {
		return $this->model->getdoc($doc_id);
	}

	public function getcurso( $curso_id = '' ) {
		return $this->model->getcurso($curso_id);
	}

	public function getasig( $asig_id = '' ) {
		return $this->model->getasig($asig_id);
	}

	public function del( $nota_id = '' ) {
		return $this->model->del($nota_id);
	}

	public function __destruct() {
		$this;
	}
}