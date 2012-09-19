<?php
/**
 * Select widget (<select>)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Select extends Widget
{
	/**
	 * $var array
	 */
	private $_items = array();

	/**
	 * @var bool
	 */
	private $_multiple = false;

	/**
	 * __construct(array, [multiple], [selector])
	 */
	public function __construct(array $items)
	{
		$this->_items = $items;
		$args = func_get_args();
		$selector = '';
		if(isset($args[2])){
			$selector = $args[2];
		}
		if(isset($args[1])){
			if(is_bool($args[1])){
				$this->_multiple = (bool) $args[1];
			}else{
				$selector = $args[1];
			}
		}
		parent::__construct($selector);
	}

	public function getItems(){
		return $this->_items;
	}

	public function getMultiple(){
		return $this->_multiple;
	}

	/**
	 * Renders widget
	 */
	public function run()
	{
		echo sprintf('<select id="%s" class="%s" %s>', $this->getId(),
			implode(' ', $this->getClasses()), $this->_multiple ? 'multiple="multiple"' : '');
		foreach($this->_items as $key => $value){
			echo sprintf('<option value="%s">%s</option>', $key, $value);
		}
		echo '</select>';
	}
}