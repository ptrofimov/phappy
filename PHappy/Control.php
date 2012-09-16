<?php
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