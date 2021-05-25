<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */

class Admin extends CI_Controller
{
	
	public function __construct()
	{

		parent::__construct();
        $this->load->model('adminModel');
        $this->load->library('form_validation');


        if (!isset($_SESSION['username'])) {
            redirect('/loginregister/errorlogin');
        } 
        else if ($_SESSION['role'] != "1") {
            redirect('/loginregister/donthaveaccess');
        }
	}

    public function index()
    {
        if (!isset($_SESSION['username'])) {
            redirect('/loginregister/errorlogin');
        } 
        else if ($_SESSION['role'] != "1") {
            redirect('/loginregister/donthaveaccess');
        }
        redirect('admin/dashboard');
    }

    public function registration()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim' );
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]', [
            'min_length' => 'Password is too short! Its needed at least 8 character!',
		]);
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|matches[password]', [
            'matches' => 'Password doesnt match! Try again!'
        ]);

		if (!$this->form_validation->run()) {
			$res = [
                'error' => true,
                'username' => form_error('username'),
                'password' => form_error('password'),
                'password_confirm' => form_error('password_confirm'),
            ];
		}
		else {
			$data = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'role' => $this->input->post('role')
			];
            $this->adminModel->registration($data);
            $res = [
                'error' => false
            ];
        }
        
        echo json_encode($res);
	}
    
	//halaman utama
	public function dashboard()
    {

        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/home', $data);
        $this->load->view('admin/admin_footer');
    }
    
    //halaman karyawan
    public function karyawan()
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/master/karyawan', $data);
        $this->load->view('admin/admin_footer');
    }   

    //delete user
    public function delete_user()
    {
        $id = $this->input->post('id');
        $res = $this->adminModel->delete_user($id);
        echo $res?json_encode(['success'=>true]): json_encode(['success'=>false]);
    }

    //update user status
    public function update_user_status()
    {
        $id = $this->input->post('id');
        $status =$this->input->post('status');
        $res = $this->adminModel->update_user_status($id, $status);
        echo $res?json_encode(['success'=>true]): json_encode(['success'=>false]);
    }

    //halaman tipesepatu
    public function tipesepatu()
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/master/tipesepatu', $data);
        $this->load->view('admin/admin_footer');
    }

    //tambah tipe sepatu
    public function add_tipesepatu()
    {
        $data = [
            'type_name' => $this->input->post('type'),
        ];
        $res = $this->adminModel->add_tipesepatu($data);
        echo $res?json_encode(['success'=>true]): json_encode(['success'=>false]);
    }

    //delete tipesepatu
    public function delete_tipesepatu()
    {
        $id = $this->input->post('id');
        $res = $this->adminModel->delete_tipesepatu($id);
        echo $res?json_encode(['success'=>true]): json_encode(['success'=>false]);
    }

    // halaman treatment
    public function treatment()
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/master/treatment', $data);
        $this->load->view('admin/admin_footer');
    }

    //tambah treatment
    public function add_treatment()
    {
        $data = [
            'treatment_name' => $this->input->post('treatment'),
            'price' => $this->input->post('price'),
            'estimated_time' => $this->input->post('estimated_time'),
        ];
        $res = $this->adminModel->add_treatment($data);
        echo $res?json_encode(['success'=>true]):json_encode(['success'=>false]);
    }

    //delete treatment
    public function delete_treatment()
    {
        $id = $this->input->post('id');
        $res = $this->adminModel->delete_treatment($id);
        echo $res?json_encode(['success'=>true]):json_encode(['success'=>false]);
    }

    //halaman customer
    public function customer()
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/master/customer', $data);
        $this->load->view('admin/admin_footer');
    }

    //halaman transaksi
    public function transaksi()
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/transaksi/transaksi', $data);
        $this->load->view('admin/admin_footer');
    }

    //halaman laporan transaksi
    public function history_transaksi()
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/laporan/transaksi', $data);
        $this->load->view('admin/admin_footer');
    }

    //halaman sepatu
    public function sepatu()
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/transaksi/sepatu', $data);
        $this->load->view('admin/admin_footer');
    }

    //halaman laporan sepatu diambil
    public function history_sepatu()
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/laporan/sepatu', $data);
        $this->load->view('admin/admin_footer');
    }

    public function detail_sepatu()
    {
        $id_sepokat = $this->input->post('id');
        $res = $this->adminModel->detail_sepatu($id_sepokat);
        $date = $res[0]->updated_at;
        $res[0]->updated_at = date('d-m-Y H:i', strtotime($date));
        echo $res==null?json_encode(['success'=>false, 'data'=>$res]):json_encode(['success'=>true, 'data'=>$res]);
    }

    //halaman tambah transaksi
    public function add_transaksi()
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/transaksi/tambah_transaksi', $data);
        $this->load->view('admin/admin_footer');
    }

    //halaman rincian pesanan
    public function rincian_pesanan($id)
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();
        $data['transaction'] = $this->adminModel->detail_transaksi($id);
        $data['shoes'] = $this->adminModel->detail_transaksi_sepatu($id);
        
        $date = strtotime($data['transaction']->created_transaction);
        $data['transaction']->created_transaction = date('d F Y', $date);

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/panel/transaksi/rincian_pesanan', $data);
        $this->load->view('admin/admin_footer');
    }

    //halaman detail transaksi
    public function detail_transaksi($page, $id)
    {
        $data['title'] = 'Cuci Sepatu | Administrator';
        $data['user'] = $this->adminModel->datauser();
        $data['transaction'] = $this->adminModel->detail_transaksi($id);
        $data['shoes'] = $this->adminModel->detail_transaksi_sepatu($id);
        
        $date = strtotime($data['transaction']->created_transaction);
        $data['transaction']->created_transaction = date('d F Y', $date);
        if ($data['transaction']->status_paid == 2) {
            $data['transaction']->total = 0.5*$data['transaction']->total;
        }

        if ($page == 'history') {
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/panel/laporan/detail_transaksi', $data);
            $this->load->view('admin/admin_footer');
        }else{
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/panel/transaksi/detail_transaksi', $data);
            $this->load->view('admin/admin_footer');
        }
    }

    public function update_sepatu()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $res = $this->adminModel->update_sepatu($id, $status);
        echo $res?json_encode(['success'=>true]):json_encode(['success'=>false]);
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