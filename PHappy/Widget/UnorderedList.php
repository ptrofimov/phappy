<?php
/**
 * Unordered list widget (<ul>)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class UnorderedList extends Widget
{
	/**
	 * @var array
	 */
	private $_items = array();

	/**
	 * __construct(array(), [selector])
	 */
	public function __construct($items){
		$this->_items = $items;
		$args = func_get_args();
		$selector = '';
		if(isset($args[1])){
			$selector = $args[1];
		}
		parent::__construct($selector);
	}

	public function getItems(){
		return $this->_items;
	}

	/**
	 * Renders the widget
	 */
	public function run(){
		echo sprintf('<ul id="%s" class="%s">', $this->getId(), implode(' ', $this->getClasses()));
		foreach($this->_items as $item){
			echo '<li>';
			if(is_object($item) && $item instanceof Widget){
				$item->run();
			}else{
				echo $item;
			}
			echo '</li>';
		}
		echo '</ul>';
	}
}