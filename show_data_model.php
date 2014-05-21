<?php
class show_data_model extends CI_Model{
	
	function show_badan_usaha(){
		$this->db->where('id', $id_reg);
		$query = $this->db->get('data_badan_usaha');
		$result = $query;
  		return $result;
	}

	public function get_all_badan_usaha(){
		$query = $this->db->get('data_badan_usaha');
		return $query->result();
	}
	 function show($table){
			$this->db->select('*');
			$data = $this->db->get($table);
			if($data->num_rows() > 0){
			return $data->result_array();
			}else{
			return false;
			}
	}
 
	function insert($data,$table){
				$this->db->insert($table, $data);
			}
	function update_img($data,$table,$id){
		$this->db->where('id_badan_usaha',$id);
		$this->db->update($table,$data);
	}

	function getByIdPengurus($id){
		$this->db->where('id', $id);
		$query = $this->db->get('pengurus');
		return $query->result();
	}

	function getByIdPekerja($id){
		//echo $id;
		$this->db->where('id', $id);
		$query = $this->db->get('tenaga_kerja');
		return $query->result();
	}

	function getByIdPeralatan($id){
		$this->db->where('id', $id);
		$query = $this->db->get('peralatan');
		return $query->result();
	}
}