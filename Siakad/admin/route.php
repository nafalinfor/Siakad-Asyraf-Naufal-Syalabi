<?php

$p = isset($_GET['p']) ? $_GET['p'] : '';


switch ($p) {
    case 'dosen':
require_once "dosen.php";
        break;
    
    case 'mahasiswa':
require_once "mahasiswa.php";
        break;
    
    case 'administrasi':
require_once "administrasi.php";
        break;
    
    case 'ganti password':
require_once "ganti_pwd.php";
        break;
    
    case 'bayar ukt':
require_once "bayarukt.php";
        break;

    case 'bayar pdh':
require_once "bayarpdh.php";
        break;

    case 'tambah mahasiswa':
require_once "tambahmahasiswa.php";
        break;
    
    case 'hapus mahasiswa':
require_once "hapusmahasiswa.php";
        break;

    case 'langganan e-book':
require_once "langganan_e-book.php";
        break;

    case 'detail mahasiswa':
require_once "detailmahasiswa.php";
        break;

    case 'edit mahasiswa':
require_once "editmahasiswa.php";
        break;
    
    case 'pegawai':
require_once "pegawai.php";
        break;
    
    case 'detail pegawai':
require_once "detailpegawai.php";
        break;

    case 'detail dosen':
require_once "detaildosen.php";
        break;
    
    case 'tambah dosen':
require_once "tambahdosen.php";
        break;

    case 'edit dosen':
require_once "editdosen.php";
        break;

    case 'hapus dosen':
require_once "hapusdosen.php";
        break;

    case 'edit pegawai':
require_once "editpegawai.php";
        break;

    case 'tambah_pegawai':
require_once "tambahpegawai.php";
        break;

    default:
require_once "dashboard.php";
        break;
}