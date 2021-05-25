<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */

class Worker extends CI_Controller
{
	
	public function __construct()
	{

		parent::__construct();
        $this->load->model('workerModel');
        $this->load->model('adminModel');
        $this->load->library('form_validation');


        if (!isset($_SESSION['username'])) {
            echo redirect('loginregister/errorlogin');
            exit;
        } 
        else if ($_SESSION['role'] != "3") {
            echo redirect('loginregister/donthaveaccess');
            exit;
        }
	}

    //halaman utama
    public function dashboard()
    {
        $data['title'] = 'Cuci Sepatu | Kang Cuci';
        $data['user'] = $this->workerModel->datauser();

        $this->load->view('worker/worker_header', $data);
        $this->load->view('worker/panel/home', $data);
        $this->load->view('worker/worker_footer');
    }

    //halaman laporan sepatu diambil
    public function history()
    {
        $data['title'] = 'Cuci Sepatu | Kang Cuci';
        $data['user'] = $this->workerModel->datauser();

        $this->load->view('worker/worker_header', $data);
        $this->load->view('worker/panel/sepatu', $data);
        $this->load->view('worker/worker_footer');
    }

    public function detail_sepatu()
    {
        $id = $this->input->post('id');
        $res = $this->adminModel->detail_sepatu($id);
        echo $res==null?json_encode(['success'=>false, 'data'=>$res]):json_encode(['success'=>true, 'data'=>$res]);
    }

    public function update_sepatu()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $res = $this->adminModel->update_sepatu($id, $status);
        echo $res?json_encode(['success'=>true]):json_encode(['success'=>false]);
    }
}

?>