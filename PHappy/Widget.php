<?php
class Widget
{
	private $_id, $_classes = array(), $_parent = null;
	private static $_idTop = 0;

	public function __construct($selector = '', $hashString = ''){
		if($selector){
			if(preg_match('/^(#[a-zA-Z0-9_-]+)?(\.[a-zA-Z0-9_-]+)*$/', $selector)){
				$items = explode('.', $selector);
				if(!empty($items[0]) && $items[0][0] == '#'){
					$this->_id = substr($items[0], 1);
					unset($items[0]);
					$items = array_values($items);
				}
				foreach($items as $item){
					$this->_classes[] = $item;
				}
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

	public function getClasses(){
		return $this->_classes;
	}

	public function run(){
		/*if(!$this->_parent && !($this instanceof Page)){
			(new Page($this))->run();
		}*/
	}

	public function setParent($parent){
		$this->_parent = $parent;
	}

	public function getParent(){
		return $this->_parent;
	}
}