<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class customerModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function search($id)
    {
        return $this->db->where('transaction_code', $id)->get('cs_transaction')->row_array();
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
}
?>