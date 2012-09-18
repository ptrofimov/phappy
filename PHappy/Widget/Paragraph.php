<?php
/**
 * Paragraph widget (<p>)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Paragraph extends Widget
{
	/**
	 * @var string
	 */
	private $_text = '';

	/**
	 * __construct(text, [selector])
	 */
	public function __construct($text){
		$this->_text = $text;
		$args = func_get_args();
		$selector = '';
		if(isset($args[1])){
			$selector = $args[1];
		}
		parent::__construct($selector, $text);
	}

	public function getText(){
		return $this->_text;
	}

	/**
	 * Renders the widget
	 */
	public function run(){
		echo sprintf('<p id="%s" class="%s">%s</p>', $this->getId(), implode(' ', $this->getClasses()), $this->_text);
	}
}