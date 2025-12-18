<?php
$p = $_GET['p'] ?? 'mahasiswa';

switch ($p) {
        case 'mahasiswa':
require_once "mahasiswa.php";
        break;

        case 'detail mhs':
require_once "detailmahasiswa.php";
        break;

        case 'jadwal mhs';
require_once "jadwal.php";  
        break;

        case 'konsultasi';
require_once "konsultasi.php";
        break;

        default:
require_once "mahasiswa.php";
        break;

 }
?>


