<?php
$p = $_GET['p'] ?? 'Dosen';


switch ($p) {
        case 'dosen':
require_once "dosen.php";
        break;

        case 'detail dosen':
require_once "detail dosen.php";
        break;

        case 'jadwal dosen';
require_once "jadwal.php";  
        break;

        case 'konsultasi';
require_once "konsultasi.php";
        break;

        default:
require_once "Dosen.php";
        break;

 }
?>


