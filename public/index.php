<?php

// * Jalankan $_SESSION
if( !session_id() ) session_start();

// ! teknik memanggil satu file dan file satu lagi memanggil program yang dibutuhkan disebut teknik bootstraping!
require_once "../app/init.php";