<?php
class Widget
{
	private $_id;
	private static $_idTop = 0;

	public function __construct($selector = '', $hashString = ''){
		if($selector){
			if(preg_match('/^#([a-zA-Z0-9_]+)$/', $selector, $matches)){
				$this->_id = $matches[1];
			}else{
				throw new Exception(sprintf('Invalid selector "%s"', $selector));
			}
		}elseif($hashString){
			if(preg_match('/#([a-zA-Z0-9_]+)/', $hashString, $matches)){
				$this->_id = $matches[1];
			}
		}
		if(!$this->_id){
			$this->_id = sprintf('control%d', self::$_idTop++);
		}
	}

	public function getId(){
		return $this->_id;
	}

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
		foreach($this->_controls as $item){
			echo $item;
		}
		echo '</form></div>';
		echo '</body>';
		echo '</html>';
	}
}