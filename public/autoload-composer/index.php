<?php
require_once __DIR__.'/vendor/autoload.php';
$alo = new \AutoloadOne\Alo;
$blo = new \AutoloadOne\Blo;
$home = new \App\Controllers\HomeController;
$loginHelper = new \Helpers\LoginHelper;
$socialHelper = new \Helpers\SocialHelper;
echo '<pre>'; var_dump($alo, $blo, $home, $loginHelper, $socialHelper); die(); echo '</pre>';