<?php

namespace App\Utility\Devices\Poseiden\DeviceConnector;

use djneo\phpMQTT;

/**
 * Class DeviceControls
 *
 * Sends mqtt signals
 */
class simpleMqttConnector
{


	/**
	 * @var phpMQTT;
	 */
	protected $mqttClass;

	protected $savedData;

	public function installConnector ()
	{

	}

    /**
     * @param $data
     */
    public function initialiseController ($data)
    {
    	$this->savedData = $data;

    }

	public function sendMessage ($data)
	{
		$this->mqttClass = new phpMQTT($this->savedData->host, $this->savedData->port, $this->savedData->clientName);

		if ($this->mqttClass->connect()) {
			$this->mqttClass->publish($data['topic'], $data['message'], $data['qos'], 1);

		}
		unset($this->mqttClass);

	}
}