<?php
class Mediator
{
	private $_form, $_list, $_values;

	public function __construct(Form $form){
		$this->_form = $form;
		if(isset($_GET['event'])){
			$this->_values = $_POST;
			$this->_form->getControl($_GET['id'])->onclick($this);
			echo $this;
			exit;
		}
	}

	public function __get($key){
		return isset($this->_values[$key]) ? $this->_values[$key] : null;
	}

	public function alert($msg)
	{
		$this->_list[] = sprintf('alert(%s)', json_encode($msg));
	}

	public function __toString(){
		return implode(';', $this->_list);
	}
}