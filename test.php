<?php

if(isset($_GET['jquery'])){
	readfile(dirname(__FILE__).'/jquery.js');
	exit;
}


class Form
{
	private $_items;

	public function __construct()
	{
		$this->_items=array();
		$args=func_get_args();
		foreach($args as $item){
			$this->_items[]=$item;
		}
	}


	public function run()
	{
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '<head>';
		echo '<script type="text/javascript" src="'.$_SERVER['PHP_SELF'].'?jquery"></script>';
		echo '</head>';
		echo '<body>';
		foreach($this->_items as $item){
			echo $item;
		}
		echo '</body>';
		echo '</html>';
	}
}

class Input
{
	private $_label, $_id;

	public function __construct($label='',$id='')
	{
		$this->_label = $label;
		$this->_id = $id;
	}

	public function __toString()
	{
		return sprintf('%s <input id="%s" value="" />',$this->_label,$this->_id);
	}
}

class Response
{
	public function alert($title)
	{

	}
}

class Button
{
	private $_label;

	public function __construct($label='')
	{
		$this->_label = $label;
	}

	public function __toString()
	{
		return sprintf('<input type="button" value="%s" onclick="alert(1);" />',$this->_label);
	}
}




(new Form(
	new Input('Enter your name', '#name'),
	new Button('OK',function($me, $data){
		$me->alert('Hello ' . $data['title']);
	})
	))->run();




