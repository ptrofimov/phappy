<?php

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
		foreach($this->_items as $item){
			echo $item;
		}
	}
}

class Input
{
	private $_label;

	public function __construct($label='')
	{
		$this->_label = $label;
	}

	public function __toString()
	{
		return sprintf('%s <input value="" />',$this->_label);
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
		return sprintf('<input type="button" value="%s" />',$this->_label);
	}
}




(new Form(
	new Input('Enter title:'),
	new Button('OK',function($me){
		$me->alert('Hello!');
	})
	))->run();

