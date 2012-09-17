<?php
require_once('Control.php');
require_once('Control/Button.php');
require_once('Control/CheckBox.php');
require_once('Control/Input.php');
require_once('Control/RadioButton.php');
require_once('Control/Select.php');
require_once('Control/TextArea.php');
require_once('Mediator.php');
class Form
{
	private $_controls;

	public function __construct()
	{
		$this->_controls = array();
		foreach(func_get_args() as $item){
			$this->_controls[ $item->getId() ] = $item;
		}
	}

	public function getControl($id){
		return isset($this->_controls[$id]) ? $this->_controls[$id] : null;
	}

	public function run()
	{
		new Mediator($this);

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