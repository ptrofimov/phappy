<?php
class Page extends Widget
{
	public function run(){
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '<head><title>PHappy</title>';
		echo '<link rel="stylesheet" type="text/css" href="'.$_SERVER['PHP_SELF'].'?css" />';
		echo '<script type="text/javascript" src="'.$_SERVER['PHP_SELF'].'?js"></script>';
		echo '</head>';
		echo '<body><div class="container">';
		echo '<form>';
		echo '<legend>Untitled form</legend>';
		echo '</form></div>';
		echo '</body>';
		echo '</html>';
	}
}