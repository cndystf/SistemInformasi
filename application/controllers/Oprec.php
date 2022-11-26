<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
//Cindy Steffani-
class Oprec extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model("TestimoniModel");
		$this->load->model("AlumniModel");
		$this->load->model("DosenModel");
		$this->load->model("ProgramStudiModel");
    }
    public function index()
    {
        $this->load->view('oprec');
    }
    public function getHome()
    {
        $this->load->view('home');
    }
    public function getTestimoni()
    {
        $this->load->view('testimoni');
    }
    public function getListTestimoni()
    {
        //echo "ini hasil dari get List Testimoni"
        $ListTestimoni = $this->TestimoniModel->getListTestimoni();
        echo json_encode($ListTestimoni);
    }
    public function getAlumniPage(){
		$this->load->view('alumni');
	}
	public function getListAlumni()
	{
		$listAlumni = $this->AlumniModel->getListAlumni();
		echo json_encode($listAlumni);
		//echo "ini hasil dari getListTestimoni";
	}
	public function addNewAlumni(){
		$alumni = $_POST;

		$statusSimpan = $this->AlumniModel->insertNewAlumni($alumni);

		if($statusSimpan==1){
			$alumni = $this->AlumniModel->getAlumniByNIM($alumni['nim']);
			$nbdata = $this->AlumniModel->getJumlahData();
		}

		$res = [
			'status'=> $statusSimpan,
			'alumni'=> $alumni,
			'nbdata' => $nbdata,
		];

		echo json_encode($res);
	}

	public function simpanData(){
		$alumni = $_POST;
		$nim_dummy = $alumni['nim_dummy']; //sementara tanpa mengggunakan session

		if($nim_dummy==''){
			$statusSimpan = $this->AlumniModel->insertNewAlumni($alumni);
			if($statusSimpan==1){
				$alumni = $this->AlumniModel->getAlumniByNIM($alumni['nim']);
			}
		}
		else{ //$nim => ada
			$statusSimpan = $this->AlumniModel->updateAlumni($nim_dummy, $alumni);
			if($statusSimpan==1){
				$alumni = $this->AlumniModel->getAlumniByNIM($nim_dummy);
			}
		}

		$nbdata = $this->AlumniModel->getJumlahData();

		$res = [
			'status'=> $statusSimpan,
			'alumni'=> $alumni,
			'nbdata' => $nbdata,
		];

		echo json_encode($res);
	}

	public function hapusAlumni(){
		$nim = $_POST['nim'];

		$statusHapus = $this->AlumniModel->hapusAlumni($nim);

		echo json_encode($statusHapus);
	}

	public function getAlumniByNIM($nim)
	{
		$alumni = $this->AlumniModel->getAlumniByNIM($nim);

		echo json_encode($alumni);
		
	}

	//disini bagian dosen
	public function getDosenPage(){
		$this->load->view('dosen');
	}
	public function getListDosen()
	{
	 	$listDosen = $this->DosenModel->getListDosen();
	 	echo json_encode($listDosen);
	 	//echo "ini hasil dari getListDosen";
	}

	public function addNewDosen(){
	 	$dosen = $_POST;

	 	$statusSimpan = $this->DosenModel->insertNewDosen($dosen);

	 	if($statusSimpan==1){
	 		$dosen = $this->DosenModel->getDosenByNIDN($dosen['nidn']);
	 		$nbdata = $this->DosenModel->getJumlahData();
	 	}

	 	$res = [
	 		'status'=> $statusSimpan,
	 		'dosen'=> $dosen,
	 		'nbdata' => $nbdata,
	 	];

	 	echo json_encode($res);
	}

	public function simpanDatadosen(){
	 	$dosen = $_POST;
	 	$nidn_dummy = $dosen['nidn_dummy']; //sementara tanpa mengggunakan session

	 	if($nidn_dummy==''){
	 		$statusSimpan = $this->DosenModel->insertNewDosen($dosen);
	 		if($statusSimpan==1){
	 			$dosen = $this->DosenModel->getDosenByNIDN($dosen['nidn']);
	 		}
	 	}
	 	else{ //$nidn => ada
	 		$statusSimpan = $this->DosenModel->updateDosen($nidn_dummy, $dosen);
	 		if($statusSimpan==1){
	 			$dosen = $this->DosenModel->getDosenByNIDN($nidn_dummy);
	 		}
	 	}

		$nbdata = $this->DosenModel->getJumlahData();

		$res = [
			'status'=> $statusSimpan,
			'dosen'=> $dosen,
			'nbdata' => $nbdata,
		];

		echo json_encode($res);
	}

	public function hapusDosen(){
		$nidn = $_POST['nidn'];

		$statusHapus = $this->DosenModel->hapusDosen($nidn);

		echo json_encode($statusHapus);
	}

	public function getDosenByNIDN($nidn)
	{
		$dosen = $this->DosenModel->getDosenByNIDN($nidn);

		echo json_encode($dosen);
		
	}

	public function getListprodi(){
		$listprodi = $this->ProgramStudiModel->getListProdi();
		echo json_encode($listprodi);
	}
}