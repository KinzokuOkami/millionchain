<?php
class Cards extends CI_Model{

	protected $table = 'cards';
 
	public function getData($id = false) {
		if($id) $query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_id = '" . $id . "' ORDER BY card_number ASC"
		);
		else $query = $this->db->query(
			"SELECT * FROM " . $this->table . " ORDER BY card_number ASC"
		);
		
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		
		return $query->result();
	}
	
	public function getByStars($num = false) {
		if($num) $query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_stars = '" . $num . "' ORDER BY card_number ASC"
		);
		else $query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_ls_type != 0 ORDER BY card_stars ASC, card_number ASC"
		);
		
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		
		return $query->result();
	}
	
	public function getByColor($num = false) {
		if($num) $query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_color = '" . $num . "' AND card_ls_type != 0 ORDER BY card_number ASC"
		);
		else $query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_ls_type != 0 ORDER BY card_color ASC, card_number ASC"
		);
		
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		
		return $query->result();
	}
	
	public function getByLS($num = false) {
		if($num) $query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_ls_type = '" . $num . "' ORDER BY card_number ASC"
		);
		else $query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_ls_type != 0 ORDER BY card_ls_type ASC, card_id ASC"
		);
		
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		
		return $query->result();
	}
	
	public function getBySkill($num = false) {
		if($num) $query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_skill_type = '" . $num . "' AND card_ls_type != 0 ORDER BY card_number ASC"
		);
		else $query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_ls_type != 0 ORDER BY card_skill_type ASC, card_id ASC"
		);
		
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		
		return $query->result();
	}
	
	public function getByHP() {
		$query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_ls_type != 0 ORDER BY card_hp DESC, card_id ASC"
		);
		
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		
		return $query->result();
	}
	
	public function getByAtk() {
		$query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_ls_type != 0 ORDER BY card_atk DESC, card_id ASC"
		);
		
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		
		return $query->result();
	}
	
	public function getByRegen() {
		$query = $this->db->query(
			"SELECT * FROM " . $this->table . " WHERE card_ls_type != 0 ORDER BY card_heal DESC, card_id ASC"
		);
		
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		
		return $query->result();
	}

	public function insert($data) {
		$this->db->query(
			"INSERT INTO " . $this->table . " (
				card_number,
				card_name,
				card_pic_small,
				card_pic_large,
				card_stars,
				card_color,
				card_ls_type,
				card_ls_x,
				card_ls_y,
				card_ls_z,
				card_skill_type,
				card_skill_x,
				card_skill_y,
				card_skill_z,
				card_atk,
				card_max_atk,
				card_hp,
				card_max_hp,
				card_heal,
				card_max_heal
			) VALUES(
				'" . $data['number'] . "',
				'" . $data['name'] . "',
				'" . $data['pic_small'] . "',
				'" . $data['pic_large'] . "',
				'" . $data['stars'] . "',
				'" . $data['color'] . "',
				'" . $data['ls_type'] . "',
				'" . $data['ls_x'] . "',
				'" . $data['ls_y'] . "',
				'" . $data['ls_z'] . "',
				'" . $data['skill_type'] . "',
				'" . $data['skill_x'] . "',
				'" . $data['skill_y'] . "',
				'" . $data['skill_z'] . "',
				'" . $data['atk'] . "',
				'" . $data['max_atk'] . "',
				'" . $data['hp'] . "',
				'" . $data['max_hp'] . "',
				'" . $data['heal'] . "',
				'" . $data['max_heal'] . "'
			)"
		);
	}
	public function update($id,$data) {
		$this->db->query(
			"UPDATE " . $this->table . " SET 
				card_number = '" . $data['number'] . "',
				card_name = '" . $data['name'] . "',
				card_pic_small = '" . $data['pic_small'] . "',
				card_pic_large = '" . $data['pic_large'] . "',
				card_stars = '" . $data['stars'] . "',
				card_color = '" . $data['color'] . "',
				card_ls_type = '" . $data['ls_type'] . "',
				card_ls_x = '" . $data['ls_x'] . "',
				card_ls_y = '" . $data['ls_y'] . "',
				card_ls_z = '" . $data['ls_z'] . "',
				card_skill_type = '" . $data['skill_type'] . "',
				card_skill_x = '" . $data['skill_x'] . "',
				card_skill_y = '" . $data['skill_y'] . "',
				card_skill_z = '" . $data['skill_z'] . "',
				card_atk = '" . $data['atk'] . "',
				card_max_atk = '" . $data['max_atk'] . "',
				card_hp = '" . $data['hp'] . "',
				card_max_hp = '" . $data['max_hp'] . "',
				card_heal = '" . $data['heal'] . "',
				card_max_heal = '" . $data['max_heal'] . "'
				 WHERE card_id = " . $id
		);
	}
	
	public function delete($id) {
		$query = $this->db->query(
			"DELETE FROM " . $this->table . " WHERE card_id = " . $id
		);
	}
}