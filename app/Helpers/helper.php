<?php

function kalkulasiTanggal($tanggalPertama, $tanggalKedua){


    $tKedua = isset($tanggalKedua) ? $tanggalKedua : date('Y-m-d');
    $tPertama = isset($tanggalPertama) ? $tanggalPertama : date('Y-m-d');

    if ($tPertama > $tKedua) {
        $temp = $tPertama;
        $tPertama = $tKedua;
        $tKedua = $temp;
    }

    $tanggalPertama = new DateTime($tPertama);
    $tanggalKedua = new DateTime($tKedua);

    $selisih = $tanggalPertama->diff($tanggalKedua);
    $tahun = $selisih->y;
    $bulan = $selisih->m;   
    $hari = $selisih->d;
    $fullhari = $selisih->days;

    $result = [
        'tahun' => $tahun,
        'bulan' => $bulan,
        'hari' => $hari,
        'total_hari' => $fullhari
    ];

    return $result;

}   

?>