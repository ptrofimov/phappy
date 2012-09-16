<?php
/**
 * Use PHappy and be happy: rapid PHP prototyping
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
if(isset($_GET['js'])) {
	header('Content-Type: text/javascript');
	readfile(dirname(__FILE__) . '/assets/jquery/jquery.js');
	readfile(dirname(__FILE__) . '/assets/bootstrap/bootstrap.js');
	readfile(dirname(__FILE__) . '/assets/phappy/phappy.js');
	exit;
} elseif(isset($_GET['css'])) {
	header('Content-Type: text/css');
	readfile(dirname(__FILE__) . '/assets/bootstrap/bootstrap.css');
	exit;
}
require_once('Form.php');










