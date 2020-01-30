<?php 
class RoleController {
	private $model;

	public function __construct() {
		$this->model = new RoleModel();
	}

	public function set( $role_data = array() ) {
		return $this->model->set($role_data);
	}

	public function get( $role_id = '' ) {
		return $this->model->get($role_id);
	}

	public function del( $role_id = '' ) {
		return $this->model->del($role_id);
	}

	public function __destruct() {
		$this;
	}
}