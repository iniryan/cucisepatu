<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */

class Customer extends CI_Controller
{
	
	public function __construct()
	{

		parent::__construct();
        $this->load->model('customerModel');
        $this->load->model('adminModel');
        $this->load->library('form_validation');

	}

    //halaman utama user
    public function index()
    {
        $data['title'] = 'Cuci Sepatu';
        // $data['user'] = $this->customerModel->datauser();

        $this->load->view('customer/customer_header', $data);
        $this->load->view('customer/panel/home2', $data);
        $this->load->view('customer/customer_footer');
    }

    //halaman utama result
    public function detail($id)
    {
        $data['title'] = 'Cuci Sepatu';
        $trans = $this->customerModel->search($id);
        $data['transaction'] = $this->customerModel->detail_transaksi($trans['transaction_id']);        
        $data['shoes'] = $this->adminModel->detail_transaksi_sepatu($trans['transaction_id']);
        $date = strtotime($data['transaction']->created_transaction);
        $data['transaction']->created_transaction = date('d F Y', $date);

        $this->load->view('customer/customer_header', $data);
        $this->load->view('customer/panel/result2', $data);
        $this->load->view('customer/customer_footer');
    }

    public function search($id)
    {
        $res = $this->customerModel->search($id);
        if ($res['transaction_code']) {
            echo json_encode(['status'=>true]);
        }
        else{
            echo json_encode(['status'=>false]);
        }
    }

}

?>