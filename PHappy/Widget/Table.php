<?php
/**
 * Table widget (<table>)
 * 
 * @author Petr Trofimov <petrofimov@yandex.ru>
 */
class Table extends Widget
{
	/**
	 * @var array
	 */
	private $_data = array();
	
	/**
	 * @var array
	 */
	private $_headers = array();

	/**
	 * __construct(data, [headers], [selector])
	 */
	public function __construct(array $data){
		$this->_data = $data;
		$args = func_get_args();
		$selector = '';
		if(isset($args[1])){
			if(is_array($args[1])){
				$this->_headers = $args[1];
			}else{
				$selector = $args[1];
			}
		}
		if(isset($args[2])){
			$selector = $args[2];
		}
		parent::__construct($selector);
	}

	public function getData(){
		return $this->_data;
	}

	public function getHeaders(){
		return $this->_headers;
	}

	/**
	 * Renders the widget
	 */
	public function run(){
		echo sprintf('<table id="%s" class="table %s">', $this->getId(), implode(' ', $this->getClasses()));
		if($this->_headers){
			echo '<thead>';
			echo '<tr>';
			foreach($this->_headers as $item){
				echo '<th>';
				if(is_object($item) && $item instanceof Widget){
					$item->run();
				}else{
					echo $item;
				}
				echo '</th>';
			}
			echo '</tr>';
			echo '</thead>';
		}
		echo '<tbody>';
		foreach($this->_data as $row){
			echo '<tr>';
			foreach($row as $item){
				echo '<td>';
				if(is_object($item) && $item instanceof Widget){
					$item->run();
				}else{
					echo $item;
				}
				echo '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
}