<?php
namespace App\Utility\PhilipsHue\DeviceInterface;


use Phue;

/**
 * Class DeviceControls
 *
 * Controls Device
 */
class BridgeConnector
{

	private $hueUserId;

	private $connecter;

	public function getAllLightsTemplates()
	{
		$lights = $this->connecter->getLights();

		$return = [];
		foreach ($lights as $light) {
			$return[] = ['systemID' => $light->getId(), 'type' => $light->getType(), 'name' => $light->getName()];
		}

		return $return;
	}
}