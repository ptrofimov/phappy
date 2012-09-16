<?php

if(isset($_GET['js'])){
	header('Content-Type: text/javascript');
	readfile(dirname(__FILE__).'/assets/jquery/jquery.js');
	readfile(dirname(__FILE__).'/assets/bootstrap/bootstrap.js');
	readfile(dirname(__FILE__).'/assets/phappy/phappy.js');
	exit;
}
if(isset($_GET['css'])){
	header('Content-Type: text/css');
	readfile(dirname(__FILE__).'/assets/bootstrap/bootstrap.css');
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
		echo '<link rel="stylesheet" type="text/css" href="'.$_SERVER['PHP_SELF'].'?css" />';
		// echo '<link rel="stylesheet" type="text/css" href="bootstrap.css" />';
		echo '<script type="text/javascript" src="'.$_SERVER['PHP_SELF'].'?js"></script>';
		echo '</head>';
		echo '<body><div class="container">';
		echo '<form>';
		echo '<legend>Use PHappy and be happy!</legend>';
		foreach($this->_items as $item){
			echo $item;
		}
		echo '</form></div>';
		echo '</body>';
		echo '</html>';
	}
}

class Control
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
			$this->_id = sprintf('control%d', $this->_idTop++);
		}
	}

	public function getId(){
		return $this->_id;
	}
}

class Input extends Control
{
	private $_label;

	public function __construct($label='', $selector='')
	{
		$this->_label = str_replace('#', '', $label);
		parent::__construct($selector, $label);
	}

	public function __toString()
	{
		return sprintf('<label>%s <input name="%s" id="%s" value="" /></label>', $this->_label, $this->getId(), $this->getId());
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

class Button extends Control
{
	private $_label, $_onclick;

	public function __construct($label, $onclick)
	{
		$this->_label = $label;
		$this->_onclick = $onclick;
		parent::__construct();
	}

	public function onclick($me){
		$onclick = $this->_onclick;
		return $onclick($me);
	}

	public function __toString()
	{
		return sprintf('<button id="%s" class="btn" type="button" onclick="phappy.onclick(this)">%s</button>', $this->getId(), $this->_label);
	}
}
