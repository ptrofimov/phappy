<?php
/**
 * Textarea widget (<textarea>)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Textarea extends Widget
{
	/**
	 * $var int
	 */
	private $_rows = 3;

	/**
	 * __construct([rows], [selector])
	 */
	public function __construct()
	{
		$args = func_get_args();
		$selector = '';
		if(isset($args[2])){
			$selector = $args[2];
		}
		if(isset($args[1])){
			if(is_numeric($args[1])){
				$this->_rows = (int) $args[1];
			}else{
				$selector = $args[1];
			}
		}
		parent::__construct($selector);
	}

	public function getRows(){
		return $this->_rows;
	}

	/**
	 * Renders widget
	 */
	public function run()
	{
		echo sprintf('<textarea id="%s" class="%s" rows="%d"></textarea>', 
			$this->getId(), implode(' ', $this->getClasses()), $this->_rows);
	}
}