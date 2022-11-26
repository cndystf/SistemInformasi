<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AlumniModel extends CI_Model {
	public function getListAlumni(){
		$sql="SELECT alumni.*, program_studi.nama_prodi as nama_prodi FROM alumni JOIN program_studi on alumni.id_program_studi = program_studi.id_program_studi";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	
	public function insertNewAlumni($alumni){
		$sql1="SELECT * FROM alumni where nim='".$alumni['nim']."'";

		$res1 = $this->db->query($sql1);

		if(count($res1->result_array())>0){ //data sudah ada, berdasarkan primary key -> NIM
			return 0;
		}
		else{
			$sql = "INSERT INTO alumni(nim, nama, angkatan, tempat_lahir, tanggal_lahir, email, id_program_studi) 
		        VALUES ('".$alumni['nim']."','".$alumni['nama']."',".$alumni['angkatan'].",'".$alumni['tempat_lahir']."','".$alumni['tanggal_lahir']."','".$alumni['email']."','".$alumni['id_program_studi']."')";

			if($this->db->query($sql)){
				return 1;
			}
			else{
				return -1;
			}
				
		}
	}

	public function updateAlumni($nim, $alumni){
		$sql = "UPDATE alumni SET 
				nama = '".$alumni['nama']."',
				angkatan = '".$alumni['angkatan']."',
				tempat_lahir = '".$alumni['tempat_lahir']."',
				tanggal_lahir = '".$alumni['tanggal_lahir']."',
				email = '".$alumni['email']."',
				id_program_studi = '".$alumni['id_program_studi']."'

				WHERE nim ='".$nim."'
				";
		if($this->db->query($sql)){
				return 1;
			}
			else{
				return 0;
			}
	}

	public function hapusAlumni($nim){
		$sql="DELETE FROM alumni WHERE nim='".$nim."'";
		if($this->db->query($sql)){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function getAlumniByNIM($nim){
		$sql = "SELECT * FROM alumni WHERE nim='".$nim."'";
		$res = $this->db->query($sql);

		return $res->result_array()[0];
	}
	public function getJumlahData(){
		$sql="SELECT * FROM alumni";
		$res = $this->db->query($sql);
		return count($res->result_array());
	}
}