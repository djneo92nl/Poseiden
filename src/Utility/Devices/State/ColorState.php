<?php
namespace App\Utility\Devices\State;

class ColorState extends DimmableState
{

	public $color;



	public function __construct ($state = self::OFF, $brightness = self::EMPTY_VALUE)
	{
		$this->brightness = $brightness;

		parent::__construct($state);
	}

}