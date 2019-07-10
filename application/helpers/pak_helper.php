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

function tugastambahan($rekap_nilai_id){
    $ci = get_instance();
    // Tugas Tambahan penugasan kurang dari 1 tahun
    $queryPKDT ="SELECT SUM(`npk`) as npk from `nilai` where `jenis` = 'pkdt' and `rekap_nilai_id` = $rekap_nilai_id";
    $resultPKDT = $ci->db->query($queryPKDT)->row();
    
    return $PKDT = $resultPKDT->npk;
}

function pengembangandiri($rekap_nilai_id,$unsur_id){
    $ci = get_instance();
    // ambil nilai AK dari PENGEMBANGAN KEPROFESIAN BERKELANJUTAN (AKPKB)
    // id dari tabel unsur AKPKB : 6,7,8
    $queryPKB = "SELECT SUM(`angka_kredit`) as jumlah from `nilai` join `kegiatan` where `nilai`.`rekap_nilai_id` = $rekap_nilai_id and `nilai`.`kegiatan_id` = `kegiatan`.`id` and `nilai`.`status` = 1 and `kegiatan`.`unsur_id` = $unsur_id";

    $result = $ci->db->query($queryPKB)->row();
    return $AKPKB = $result->jumlah;
}

function penunjang($rekap_nilai_id,$unsur_id){
    $ci = get_instance();
    // ambil nilai AK dari PENUNJANG TUGAS GURU (AKP)
    // id dari tabel unsur AKP : 9,10,11
    $queryAKP = "SELECT SUM(`angka_kredit`) as jumlah from `nilai` join `kegiatan` where `nilai`.`rekap_nilai_id` = $rekap_nilai_id and `nilai`.`kegiatan_id` = `kegiatan`.`id` and `nilai`.`status` = 1 and `kegiatan`.`unsur_id` = $unsur_id";

    $result = $ci->db->query($queryAKP)->row();
    return $AKP = $result->jumlah;
}