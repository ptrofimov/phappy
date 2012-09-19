<?php
/**
 * CheckBox widget (<input type="checkbox">)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class CheckBox extends Widget
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
		echo sprintf('<label><input type="checkbox" id="%s" class="%s" /> %s</label>',
			$this->getId(), implode(' ', $this->getClasses()), $this->_label);
	}
}