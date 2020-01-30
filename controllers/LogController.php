<?php 
class LogController {
	private $model;

	public function __construct() {
		$this->model = new LogModel();
	}

	public function set( $log_data = array() ) {
		return $this->model->set($log_data);
	}

	public function get( $log_id = '' ) {
		return $this->model->get($log_id);
	}

	public function getcurso( $curso_id = '' ) {
		return $this->model->getcurso($curso_id);
	}

	public function getcorte( $corte_id = '' ) {
		return $this->model->getcorte($corte_id);
	}

	public function getl( $logro_id = '' ) {
		return $this->model->getl($logro_id);
	}

	public function del( $log_id = '' ) {
		return $this->model->del($log_id);
	}

	public function __destruct() {
		$this;
	}
}