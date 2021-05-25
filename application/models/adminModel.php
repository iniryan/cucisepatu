<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class adminModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registration($data)
    {
        $data = [
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => $data['role'],
            'status' => 1,
        ];
        $this->db->insert('cs_user', $data);
    }

    //datauser / session
    public function datauser()
    {
        return $this->db->get_where('cs_user', ['username' => $this->session->userdata('username')])->row_array();
    }

    //delete user
    public function delete_user($id)
    {
        return $this->db->delete('cs_user', ['user_id' => $id]);
    }

    //update user status
    public function update_user_status($id, $status)
    {
        return $this->db->where('user_id', $id)->set('status', $status)->update('cs_user');
    }

    //delete treatment
    public function delete_treatment($id)
    {
        return $this->db->delete('cs_treatment', ['treatment_id' => $id]);
    }

    //delete tipesepatu
    public function delete_tipesepatu($id)
    {
        return $this->db->delete('cs_type', ['type_id' => $id]);
    }

    // add treatment 
    public function add_treatment($data)
    {
        return $this->db->insert('cs_treatment', $data);
    }

    //add tipesepatu
    public function add_tipesepatu($data)
    {
        return $this->db->insert('cs_type', $data);
    }

    public function detail_sepatu($id)
    {   
        return $this->db->query('SELECT * FROM cs_detail_transaction AS detail
                                    JOIN cs_transaction AS trans
                                    ON detail.transaction_id = trans.transaction_id
                                    JOIN cs_shoes AS shoes
                                    ON detail.shoes_id = shoes.shoes_id
                                    JOIN cs_treatment AS treatment
                                    ON detail.treatment_id = treatment.treatment_id
                                    JOIN cs_type AS tipe
                                    ON shoes.type_id = tipe.type_id
                                    WHERE detail_transaction_id = '.$id.'')->result();
    }

    public function detail_transaksi($id)
    {
        return $this->db->query('SELECT trans.*, customer.*, kasir.username FROM cs_transaction AS trans
                                    JOIN cs_customer AS customer
                                    ON trans.customer_id = customer.customer_id
                                    JOIN cs_user AS kasir
                                    ON trans.user_id = kasir.user_id
                                    WHERE trans.transaction_id = '.$id.'')->row();
    }

    public function detail_transaksi_sepatu($id)
    {
        return $this->db->query('SELECT * FROM cs_detail_transaction AS detail
                                    JOIN cs_shoes AS shoes
                                    ON detail.shoes_id = shoes.shoes_id
                                    JOIN cs_treatment AS treatment
                                    ON detail.treatment_id = treatment.treatment_id
                                    JOIN cs_type AS tipe
                                    ON shoes.type_id = tipe.type_id
                                    WHERE detail.transaction_id = '.$id.'')->result();
    }

    public function update_sepatu($id, $status)
    {
        return $this->db->where('shoes_id', $id)->set('status', $status+1)->update('cs_shoes');
    }

    public function update_transaction($id, $data)
    {
        return $this->db->where('transaction_code', $id)->update('cs_transaction', $data);
    }

    public function add_customer($data)
    {
        $res = $this->db->insert('cs_customer', $data);
        if ($res) {            
            return $this->db->get_where('cs_customer', ['phone_number'=> $data['phone_number']])->row_array();
        }
    }

    public function add_transaction($data)
    {
        $res = $this->db->insert('cs_transaction', $data);
        if ($res) {
            return $this->db->get_where('cs_transaction', ['transaction_code'=> $data['transaction_code']])->row_array();
        }
    }

    public function add_shoes($data)
    {
        $res = $this->db->insert('cs_shoes', $data);
        if ($res) {
            return $this->db->get_where('cs_shoes', ['shoes_code'=> $data['shoes_code']])->row_array();
        }
    }

    public function add_detail_transaction($data)
    {
        return $this->db->insert('cs_detail_transaction', $data);
    }

    public function count_shoes()
    {
        return $this->db->count_all_results('cs_shoes');
    }

    public function count_transaction()
    {
        return $this->db->count_all_results('cs_transaction');
    }
}
?>