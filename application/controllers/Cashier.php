<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */

class Cashier extends CI_Controller
{
	
	public function __construct()
	{

		parent::__construct();
        $this->load->model('cashierModel');
        $this->load->model('adminModel');
        $this->load->library('form_validation');


        if (!isset($_SESSION['username'])) {
            echo redirect('loginregister/errorlogin');
            exit;
        } 
        else if ($_SESSION['role'] != "2") {
            echo redirect('loginregister/donthaveaccess');
            exit;
        }
	}

    //halaman utama
    public function dashboard()
    {
        $data['title'] = 'Cuci Sepatu | Kasir';
        $data['user'] = $this->cashierModel->datauser();

        $this->load->view('cashier/cashier_header', $data);
        $this->load->view('cashier/panel/home', $data);
        $this->load->view('cashier/cashier_footer');
    }

    //halaman laporan transaksi
    public function transaksi()
    {
        $data['title'] = 'Cuci Sepatu | Kasir';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('cashier/cashier_header', $data);
        $this->load->view('cashier/panel/home', $data);
        $this->load->view('cashier/cashier_footer');
    }

    public function history()
    {
        $data['title'] = 'Cuci Sepatu | Kasir';
        $data['user'] = $this->cashierModel->datauser();

        $this->load->view('cashier/cashier_header', $data);
        $this->load->view('cashier/panel/transaksi', $data);
        $this->load->view('cashier/cashier_footer');
    }

    //halaman tambah transaksi
    public function add_transaksi()
    {
        $data['title'] = 'Cuci Sepatu | Kasir';
        $data['user'] = $this->cashierModel->datauser();

        $this->load->view('cashier/cashier_header', $data);
        $this->load->view('cashier/panel/tambah_transaksi', $data);
        $this->load->view('cashier/cashier_footer');
    }

    //halaman rincian pesanan
    public function rincian_pesanan($id)
    {
        $data['title'] = 'Cuci Sepatu | Kasir';
        $data['user'] = $this->cashierModel->datauser();
        $data['transaction'] = $this->adminModel->detail_transaksi($id);
        $data['shoes'] = $this->adminModel->detail_transaksi_sepatu($id);
        
        $date = strtotime($data['transaction']->created_transaction);
        $data['transaction']->created_transaction = date('d F Y', $date);

        $this->load->view('cashier/cashier_header', $data);
        $this->load->view('cashier/panel/rincian_pesanan', $data);
        $this->load->view('cashier/cashier_footer');
    }

    public function detail_sepatu()
    {
        $id_sepokat = $this->input->post('id');
        $res = $this->adminModel->detail_sepatu($id_sepokat);
        $date = $res[0]->updated_at;
        $res[0]->updated_at = date('d-m-Y H:i', strtotime($date));
        echo $res==null?json_encode(['success'=>false, 'data'=>$res]):json_encode(['success'=>true, 'data'=>$res]);
    }

    public function detail_transaksi($page, $id)
    {
        $data['title'] = 'Cuci Sepatu | Kasir';
        $data['user'] = $this->adminModel->datauser();
        $data['transaction'] = $this->adminModel->detail_transaksi($id);
        $data['shoes'] = $this->adminModel->detail_transaksi_sepatu($id);
        
        $date = strtotime($data['transaction']->created_transaction);
        $data['transaction']->created_transaction = date('d F Y', $date);
        if ($data['transaction']->status_paid == 2) {
            $data['transaction']->total = 0.5*$data['transaction']->total;
        }
        
        if ($page == 'history') {
            $this->load->view('cashier/cashier_header', $data);
            $this->load->view('cashier/panel/detail_history', $data);
            $this->load->view('cashier/cashier_footer');
        }else{
            $this->load->view('cashier/cashier_header', $data);
            $this->load->view('cashier/panel/detail_transaksi', $data);
            $this->load->view('cashier/cashier_footer');
        }
    }

    public function update_transaction()
    {
        $id = $this->input->post('id');
        $metode = $this->input->post('metode');
        $checkbox = $this->input->post('checkbox');
        $data = [
            'total' => $this->input->post('total'),
            'bayar' => $this->input->post('bayar'),
            'kembalian' => $this->input->post('kembalian'),
            'status_paid' => $metode,
        ];
        $checkbox=='true'?$data['delivery']=1:null;
        $res = $this->adminModel->update_transaction($id, $data);
        echo $res?json_encode(['success'=>true]):json_encode(['success'=>false]);
    }

    public function add_transaction()
    {
        $data = $this->input->post('data');
        $total = 0;
        $customer_name = $this->input->post('customer_name');
        $phone_number = $this->input->post('phone_number');
        $address = $this->input->post('address');
        $treatment_price = $this->input->post('price');

        foreach ($data as $i) {
            $total+=$i['price'];
        }

        $data_customer = [
            'customer_name'=>$customer_name,
            'phone_number'=>$phone_number,
            'address'=>$address,
        ];
        $res_customer = $this->adminModel->add_customer($data_customer);
        
        $transaction_count = $this->adminModel->count_transaction()+1;
        $transaction_code = strtoupper(substr(md5(date('l jS \of F Y h:i:s A')), 0, 8));
        $data_transaction = [
            'transaction_code'=>'TRX'.$transaction_code,
            'user_id'=>$_SESSION['access'],
            'customer_id'=>$res_customer['customer_id'],
            'status_paid'=>2,
            'total'=>$total,
        ];
        $res_transaction = $this->adminModel->add_transaction($data_transaction);

        foreach ($data as $item) {            
            $shoes_count = $this->adminModel->count_shoes()+1;
            $shoes_code = strtoupper(substr(md5($transaction_code), 0, 8));
            $data_sepatu = [       
                'shoes_code'=>'SHO'.$shoes_code.$shoes_count,
                'brand'=>$item['brand'],
                'color'=>$item['color'],
                'size'=>$item['size'],
                'type_id'=>$item['type'],
                'note'=>$item['note'],
            ];
            $res_shoes = $this->adminModel->add_shoes($data_sepatu);
    
            $data_detail_transaction = [
                'transaction_id'=>$res_transaction['transaction_id'],
                'shoes_id'=>$res_shoes['shoes_id'],
                'treatment_id'=>$item['treatment'],
                'note'=>'-',
            ];
            $res_detail_transaction = $this->adminModel->add_detail_transaction($data_detail_transaction);
        }

        echo $res_detail_transaction?json_encode(['success'=>true, 'id'=>$res_transaction['transaction_id']]):json_encode(['success'=>false]);        
    }
}

?>