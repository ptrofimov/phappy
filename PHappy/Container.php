<?php
/**
 * Container widget (contains other widgets)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Container extends Widget
{
	/**
	 * @var array
	 */
	private $_widgets = array();

	public function add($item){
		if($item instanceof Closure){
			$item($this);
		}/*elseif($item instanceof Container){
			$this->add($item->widgets());
		}*/elseif(is_array($item)){
			foreach($item as $i){
				$this->add($i);
			}
		}elseif($item instanceof Widget){
			$this->_widgets[ $item->getId() ] = $item;
		}else{
			throw new Exception('Invalid argument');
		}
	}

	public function widgets(){
		return $this->_widgets;
	}

	public function run(){
		foreach($this->widgets() as $widget){
			$widget->run();
		}
	}
}