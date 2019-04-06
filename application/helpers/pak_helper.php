<?php

function cek_login(){
    $ci = get_instance();

    // cek sudah login ?
    if(!$ci->session->userdata('nama')){
        // belum
        redirect('auth');
    } else {
        $link = $ci->uri->segment(1,0);
        $role_id =  $ci->session->userdata('role_id');

        $dataRole = $ci->db->get_where('role',['id' => $role_id, 'link' => $link]);
        
        if($dataRole->num_rows() < 1){
            redirect('auth/forbidden');
        }

    }
}