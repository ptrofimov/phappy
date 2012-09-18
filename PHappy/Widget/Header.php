<?php
/**
 * Header widget (h1, h2, etc)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Header extends Widget
{
	/**
	 * @var string
	 */
	private $_title = '';

	/**
	 * @var integer
	 */
	private $_level = 1;

	/**
	 * __construct(title, [level], [selector])
	 */
	public function __construct($title){
		$this->_title = $title;
		$args = func_get_args();
		$selector = '';
		if(isset($args[1])){
			if(is_numeric($args[1])){
				$this->_level = (int) $args[1];
			}else{
				$selector = $args[1];
			}
		}
		if(isset($args[2])){
			$selector = $args[2];
		}
		parent::__construct($selector, $title);
	}

	public function getTitle(){
		return $this->_title;
	}

	public function getLevel(){
		return $this->_level;
	}

	/**
	 * Renders the widget
	 */
	public function run(){
		echo sprintf('<h%d id="%s" class="%s">%s</h%d>', $this->_level, $this->getId(), implode(' ', $this->getClasses()), $this->_title, $this->_level);
	}
}