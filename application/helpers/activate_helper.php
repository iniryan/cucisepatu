<?php
    function activate_menu($menu, $menu2 = null)
    {
        $CI =& get_instance();
        $classname = $CI->uri->segment(2);
        return $classname==$menu|| $classname==$menu2?'active':'';
    }

    function activate_menu_open($dropdown)
    {
        $CI =& get_instance();
        $classname = $CI->uri->segment(2);
        $menu = [];
        if ($dropdown == 'master') {
            $menu = ['karyawan', 'treatment', 'customer', 'tipesepatu'];
        }elseif ($dropdown == 'transaksi') {
            $menu = ['transaksi', 'sepatu', 'addTransaksi', 'rincian_pesanan', 'detailTransaksi'];
        }elseif ($dropdown == 'laporan') {
            $menu = ['history_transaksi', 'history_sepatu'];
        }


        foreach ($menu as $item) { 

            if ($item == $classname) {
                return 'menu-open';
            }
        }

    }
?>