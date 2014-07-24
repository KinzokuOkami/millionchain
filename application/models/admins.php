<?php
class admins extends CI_Model{

	protected $table = 'admins';
 
	public function getData($user) {
		$query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE admin_user = '" . $user . "'"
		);
		
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		
		return $query->result();
	}
}