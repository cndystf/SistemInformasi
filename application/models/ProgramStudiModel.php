<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProgramStudiModel extends CI_Model {
	public function getListProdi(){
		$sql="SELECT * FROM program_studi";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
}