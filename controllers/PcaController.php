<?php 
class PcaController {
	private $model;

	public function __construct() {
		$this->model = new PcaModel();
	}

	public function set( $pca_data = array() ) {
		return $this->model->set($pca_data);
	}

	public function get( $pca_id = '' ) {
		return $this->model->get($pca_id);
	}

	public function getdoc( $doc_id = '' ) {
		return $this->model->getdoc($doc_id);
	}
	public function del( $pca_id = '' ) {
		return $this->model->del($pca_id);
	}

	public function __destruct() {
		$this;
	}
}