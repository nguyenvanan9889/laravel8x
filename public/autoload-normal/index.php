<?php
require_once 'Autoload.php';
$alo = new \AutoloadNormal\Alo;
$blo = new \AutoloadNormal\Blo;
$homeController = new \App\Controllers\HomeController;
echo '<pre>'; var_dump($alo, $blo, $homeController); die(); echo '</pre>';