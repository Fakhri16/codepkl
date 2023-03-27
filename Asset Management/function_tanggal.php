<?php 

// input tanggal 
function inputtgl($tanggal)
{
    $pisah = explode('/', $tanggal);
    $lari = array($pisah[2], $pisah[1], $pisah[0]);
    $satukan = implode("-", $lari);

    return $satukan;
}

// edit tanggal
function edittgl($tanggal) 
{
    $pisah = explode('-', $tanggal);
    $lari = array($pisah[2], $pisah[1], $pisah[0]);
    $satukan = implode("/", $lari);

    return $satukan;
}

// tanggal indo
function Tanggalindo($tgl) 
    {
    $tanggal = substr($tgl, 8, 2);
    $bulan = Bulan(substr($tgl, 5, 2)); 
    $tahun = substr($tgl, 0, 4);

    return $tanggal . " " . $bulan . " ". $tahun;
}

// function bulan
function Bulan($bln) 
{
    if ($bln == "01") {
        return "Januari";
    } elseif($bln == "02") {
        return "Februari";  
    } elseif($bln == "03") {
        return "Maret";  
    } elseif($bln == "04") {
        return "April";  
    } elseif($bln == "05") {
        return "Mei";  
    } elseif($bln == "06") {
        return "Juni";  
    } elseif($bln == "07") {
        return "Juli";  
    } elseif($bln == "08") {
        return "Agustus";  
    } elseif($bln == "09") {
        return "September";  
    } elseif($bln == "10") {
        return "Oktober";  
    } elseif($bln == "11") {
        return "November";  
    } elseif($bln == "12") {
        return "Desember";  
    } 
}


