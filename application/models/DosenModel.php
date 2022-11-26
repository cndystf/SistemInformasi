<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Cindy Steffani-
//ini model buat dosen 
class DosenModel extends CI_Model {
	public function getListDosen(){
		$sql="SELECT * FROM dosen";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function insertNewDosen($dosen){
		$sql1="SELECT * FROM dosen where nidn='".$dosen['nidn']."'";

		$res1 = $this->db->query($sql1);

		if(count($res1->result_array())>0){ 
			return 0;
		}
		else{
			$sql = "INSERT INTO dosen(nidn, nama, gender, program_studi, alamat, email) 
		        VALUES ('".$dosen['nidn']."','".$dosen['nama']."', '".$dosen['gender']." ', '".$dosen['program_studi']."','".$dosen['alamat']."','".$dosen['email']."')";

			if($this->db->query($sql)){
				return 1;
			}
			else{
				return -1;
			}
				
		}
	}

	public function updateDosen($nidn, $dosen){
		$sql = "UPDATE dosen SET 
				nama = '".$dosen['nama']."',
				gender = '".$dosen['gender']."',
				program_studi = '".$dosen['program_studi']."',
				alamat = '".$dosen['alamat']."',
				email = '".$dosen['email']."'

				WHERE nidn ='".$nidn."'
				";
		if($this->db->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
	}

	public function hapusDosen($nidn){
		$sql="DELETE FROM dosen WHERE nidn='".$nidn."'";
		if($this->db->query($sql)){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function getDosenByNIDN($nidn){
		$sql = "SELECT * FROM dosen WHERE nidn='".$nidn."'";
		$res = $this->db->query($sql);

		return $res->result_array()[0];
	}

	public function getJumlahData(){
		$sql="SELECT * FROM dosen";
		$res = $this->db->query($sql);
		return count($res->result_array());
	}
}