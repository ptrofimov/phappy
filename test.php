<?php

if(isset($_GET['jquery'])){
	readfile(dirname(__FILE__).'/jquery.js');
	readfile(dirname(__FILE__).'/phappy.js');
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
		if(isset($_GET['event'])){
			//echo sprintf('alert(%s)',json_encode(var_export($_POST,true)));
			$me = new Me($_POST);
			$this->_items[1]->onclick($me);
			echo $me;
			exit;
		}

		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '<head>';
		echo '<script type="text/javascript" src="'.$_SERVER['PHP_SELF'].'?jquery"></script>';
		echo '</head>';
		echo '<body>';
		echo '<form>';
		foreach($this->_items as $item){
			echo $item;
		}
		echo '</form>';
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
		return sprintf('%s <input name="title" id="%s" value="" />',$this->_label,$this->_id);
	}
}

class Me
{
	private $_list;

	public function __construct($data){
		foreach($data as $key=>$item){
			$this->{$key} = $item;
		}
	}

	public function alert($msg)
	{
		$this->_list[] = sprintf('alert(%s)', json_encode($msg));
	}

	public function __toString(){
		return implode(';', $this->_list);
	}
}

class Button
{
	private $_label, $_onclick;

	public function __construct($label='', $onclick)
	{
		$this->_label = $label;
		$this->_onclick = $onclick;
	}

	public function onclick($me){
		$onclick = $this->_onclick;
		return $onclick($me);
	}

	public function __toString()
	{
		return sprintf('<input type="button" value="%s" onclick="phappy.onclick(this)" />',$this->_label);
	}
}




(new Form(
	new Input('Enter your name', '#name'),
	new Button('OK', function($me) {
		$me->alert('Hello ' . $me->title);
	})
	))->run();




