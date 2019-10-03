<?php
//Mengecek apakah halaman ada session atau tidak
if (!session_id()) session_start();
require_once '../app/init.php';

$app = new App;
