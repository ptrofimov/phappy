<?php
class Page extends Widget
{
	public function __construct(){

	}

	public function run(){
		if(isset($_GET['css'])){
			header('Content-Type: text/css');
			readfile(__DIR__ . '/assets/bootstrap/bootstrap.css');
			exit;
		}elseif(isset($_GET['js'])){
			header('Content-Type: text/javascript');
			readfile(__DIR__ . '/assets/jquery/jquery.js');
			readfile(__DIR__ . '/assets/bootstrap/bootstrap.js');
			readfile(__DIR__ . '/assets/phappy/phappy.js');
			exit;
		}
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '<head><title>PHappy</title>';
		echo '<link rel="stylesheet" type="text/css" href="'.$_SERVER['PHP_SELF'].'?css" />';
		echo '<script type="text/javascript" src="'.$_SERVER['PHP_SELF'].'?js"></script>';
		echo '</head>';
		echo '<body>';
		echo '<div class="container">';
		echo '</div>';
		echo '</body>';
		echo '</html>';
	}
}