<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

 	function __construct()
    {
            parent::__construct();

            $this->load->helper(array('form', 'url', 'download'));
            $this->load->model('Aplikasiku_model');
            $this->load->library('session');

    }



	public function index()
	{
		$this->load->view('LoginView');
	}


	public function login()
	{
		$uname 	= $this->input->post('uname');
		$pass 	= $this->input->post('pass');

		$cek 	= $this->Aplikasiku_model->getLogin($uname, $pass);

		if ($cek == TRUE) {

			$newdata = array(
	        'username'  => $uname
			);

			$this->session->set_userdata($newdata);

			redirect('Login/homeView');

		} else {

			$this->session->set_flashdata('validasi','Usename atau Password Salah'); 
			// echo "Usename atau Password Salah" ;
			$this->load->view('LoginView');

		}

		
	}

	public function session_destroy()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}

	public function daftarView()
	{
		$this->load->view('DaftarView');
	}

	public function homeView()
	{
		$data['get_penduduk'] = $this->Aplikasiku_model->getPenduduk();

		$this->load->view('HomeView', $data);
	}


	public function daftar()
	{
		$uname 	= $this->input->post('uname');
		$pass 	= $this->input->post('pass');

		$data = array(

			'uname' => $uname,
			'password' => $pass 

		);

		$this->Aplikasiku_model->addDaftar($data);

		$this->session->set_flashdata('validasi','Berhasil Mendaftar Akun Baru'); 
		// echo "Berhasil Mendaftar Akun Baru";
		$this->load->view('DaftarView');
	}

	public function addPenduduk()
	{
		$no_ktp 	= $this->input->post('no_ktp');
		$nama 		= $this->input->post('nama');
		$tanggal 	= date('Y-m-d', strtotime( $this->input->post('tanggal') ));

		$alamat 	= $this->input->post('alamat');

		$this->debug_to_console($tanggal);

		$cek = $this->Aplikasiku_model->cekPenduduk($no_ktp);

		if (empty($cek)) {
				$data = array(

				'no_ktp' 		=> $no_ktp,
				'nama' 			=> $nama, 
				'tanggal_lahir' => $tanggal ,
				'alamat' 		=> $alamat 

				);

				$this->Aplikasiku_model->addPenduduk($data);

				// echo "Berhasil Mendaftar Penduduk Baru";
				$this->session->set_flashdata('validasi','Berhasil Mendaftar Penduduk Baru'); 
		} else {
				$this->session->set_flashdata('validasi','No KTP Sudah Terdaftar!!, Silahkan Daftar dengan No KTP berbeda'); 
				// echo "No KTP Sudah Terdaftar";
		}

		
		redirect('Login/homeView');

	}



    public function getDataBiodata() {
        $no_ktp = $_POST['no_ktp'];

        $data = $this->Aplikasiku_model->getDataBiodata($no_ktp);
 
        echo json_encode($data);
    }

    public function getDeleteData($no_ktp) {

			$this->Aplikasiku_model->getDeleteData($no_ktp);

			// echo "Berhasil Menghapus Penduduk";
			$this->session->set_flashdata('validasi','Berhasil Menghapus Penduduk'); 
			redirect('Login/homeView');
		}


    public function setDataBiodata()
    {
    	$no_ktp_edit 	= $this->input->post('no_ktp_edit');
		$nama_edit 		= $this->input->post('nama_edit');
		$tanggal_edit	= date('Y-m-d', strtotime( $this->input->post('tanggal_edit') ));
		$alamat_edit	= $this->input->post('alamat_edit');


		$data = array(

			'no_ktp' 		=> $no_ktp_edit,
			'nama' 			=> $nama_edit, 
			'tanggal_lahir' => $tanggal_edit ,
			'alamat' 		=> $alamat_edit 

		);

		$this->Aplikasiku_model->setPenduduk($data);

		// echo "Berhasil Mengubah Biodata";
		$this->session->set_flashdata('validasi','Berhasil Mengubah Biodata'); 
		redirect('Login/homeView');
    }


	public function debug_to_console($data) {
	    if(is_array($data) || is_object($data))
		{
			echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
		} else {
			echo("<script>console.log('PHP: ".$data."');</script>");
	}
}
}
