<?php
$p = $_GET['p'] ?? 'pegawai';


switch ($p) {
        case 'pegawai':
require_once "pegawai.php";
        break;

        case 'Detail-pegawai':
require_once "detailpegawai.php";
        break;

        case 'jadwal';
require_once "jadwal.php";  
        break;

        case 'konsultasi';
require_once "konsultasi.php";
        break;

        default:
require_once "pegawai.php";
        break;

 }
?>


