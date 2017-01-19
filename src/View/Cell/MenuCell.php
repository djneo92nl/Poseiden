<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Menu cell
 */
class MenuCell extends Cell {

	/**
	 * List of valid options that can be passed into this
	 * cell's constructor.
	 *
	 * @var array
	 */
	protected $_validCellOptions = [];

	/**
	 * Default display method.
	 *
	 * @return void
	 */
	public function display()
	{
		$this->loadModel('Menu');
		$menu = $this->Menu->find();
		$this->set('menu', $menu);
	}
}
