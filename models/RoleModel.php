<?php 
class RoleModel extends Model {
	public function set( $role_data = array() ) {
		foreach ($role_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO role (role_id, role) VALUES ($role_id, '$role')";
		$this->set_query();
	}

	public function get( $role_id = '') {
		$this->query = ($role_id != '')
			?"SELECT * FROM role WHERE role_id = $role_id"
			:"SELECT * FROM role";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $role_id = '' ) {
		$this->query = "DELETE FROM role WHERE role_id = $role_id";
		$this->set_query();
	}

	public function __destruct() {
		$this;
	}
}