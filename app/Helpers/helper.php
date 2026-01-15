<?php
use Carbon\Carbon;

function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}


// function kalkulasiTanggal2($tanggalPertama, $tanggalKedua){
//     // $date1 = str_replace('/', '-', $date1);
//     // $date2 = explode('-', $tanggalKedua);
//     // $date1 = explode('-', $tanggalPertama);

//     // jika tanggal kedua lebih besar dari tanggal pertama, maka kita tukar
//     // jika tanggal kedua sama dengan 0 atau tidak valid, maka kita samakan dengan tanggal pertama
//     // jika tanggal kedua lebih kecil dari tanggal pertama, maka biarkan saja
//     // jika tanggal kedua tidak di set, maka samakan dengan tanggal pertama
//     // jika tanggal kedua di set, maka gunakan tanggal kedua
//     // gunakan tanggal hari ini
//     // $tanggalKedua = isset($tanggalKedua) ? $tanggalKedua : $tanggalPertama;
//     // dd(isset($tanggalKedua));
//     // $tanggalKedua = date('Y-m-d', strtotime($tanggalKedua));
//     // $tanggalPertama = date('Y-m-d', strtotime($tanggalPertama));

//     // dd($tanggalPertama, $tanggalKedua);

//     $tKedua = isset($tanggalKedua) ? $tanggalKedua : (isset($tanggalPertama) ? $tanggalPertama : date('Y-m-d'));
//     // $tanggalKedua = isset($tanggalKedua) ? $tanggalKedua : $tanggalPertama;
//     $tPertama = isset($tanggalPertama) ? $tanggalPertama : (isset($tanggalKedua) ? $tanggalKedua : date('Y-m-d'));
//     // $tanggalPertama = isset($tanggalPertama) ? $tanggalPertama : $tanggalKedua;
//     // dd($tanggalKedua);
//     if ($tKedua > $tPertama) {
//         $temp = $tPertama;
//         $tPertama = $tKedua;
//         $tKedua = $temp;
//     }

//     $start = Carbon::parse($tPertama);
//     $end = Carbon::parse($tKedua);
//     dd($start, $end);
//     $diff = $start->diff($end = Carbon::parse($tKedua));
//     return "{$diff->y} Tahun, {$diff->m} Bulan, {$diff->d} Hari";
//     // $diff = abs(strtotime($tPertama) - strtotime($tKedua));
//     // $selisih = strtotime($tPertama) - strtotime($tKedua);
//     // $hari = $selisih / (60*60*24);
//     // $bulan = floor($selisih / (30*60*60*24));           
//     // $tahun = floor($selisih / (365*60*60*24));  
//     // return "{$tPertama} - {$tKedua} = {$tahun} Tahun, {$bulan} Bulan, {$hari} Hari";

// }

function kalkulasiTanggal2($tanggalPertama, $tanggalKedua){


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