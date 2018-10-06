<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING);
setlocale(LC_ALL, "ru_RU.UTF-8");
header('Content-type: text/html; charset=utf-8');

if(phpversion() < "5.4.0") 		die('inWidget required PHP >= <b>5.4.0</b>. Your version: '.phpversion());
if(!extension_loaded('curl')) 	die('inWidget required <b>cURL PHP extension</b>. Please, install it or ask your hosting provider.');

#ini_set('include_path', __DIR__ .'/' );

#require_once 'classes/Autoload.php';
require_once 'classes/InstagramScraper.php';
require_once 'classes/Unirest.php';
require_once 'classes/InWidget.php';

/* -----------------------------------------------------------
	Native initialization
 ------------------------------------------------------------*/

try {
	$inWidget = new \inWidget\Core;
	$inWidget->getData();
	include 'template.php';
}
catch (\Exception $e) {
	echo $e->getMessage();
}
