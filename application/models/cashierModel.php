<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class cashierModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //datauser / session
    public function datauser()
    {

        return $this->db->get_where('cs_user', ['username' => $this->session->userdata('username')])->row_array();
    }

}
?>