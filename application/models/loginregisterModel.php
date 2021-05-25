<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class loginregisterModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsername($username)
    {
        return $this->db->get_where('cs_user', ['username' => $username])->row_array();
    }
}
