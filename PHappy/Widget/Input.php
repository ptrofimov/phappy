<?php
/**
 * Input widget (<input type="text">)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Input extends Widget
{
	/**
	 * @var string
	 */
	private $_label = '';

	/**
	 * __construct(label, [selector])
	 */
	public function __construct($label)
	{
		$args = func_get_args();
		$selector = '';
		if(isset($args[1])){
			$selector = $args[1];
		}
		parent::__construct($selector, $label);
		$this->_label = str_replace('#', '', $label);
	}

	public function getLabel(){
		return $this->_label;
	}

	/**
	 * Renders widget
	 */
	public function run()
	{
		echo sprintf('<label>%s <input type="text" id="%s" class="%s" value="" /></label>', $this->_label, $this->getId(), implode(' ', $this->getClasses()));
	}
}