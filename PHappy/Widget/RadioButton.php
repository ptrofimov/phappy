<?php
/**
 * RadioButton widget (<input type="radio">)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class RadioButton extends Widget
{
	/**
	 * $var array
	 */
	private $_items = array();

	/**
	 * __construct(array, [selector])
	 */
	public function __construct(array $items)
	{
		$this->_items = $items;
		$selector = '';
		$args = func_get_args();
		if(isset($args[1])){
			$selector = $args[1];
		}
		parent::__construct($selector);
	}

	public function getItems(){
		return $this->_items;
	}

	/**
	 * Renders widget
	 */
	public function run()
	{
		foreach($this->_items as $key => $value){
			echo sprintf('<label class="radio"><input type="radio" name="%s" value="%s" /> %s</label>',
				$this->getId(), $key, $value);
		}
	}
}