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



	public function installConnector ()
	{

	}

    /**
     * @param $data
     */
    public function initialiseController ($data)
    {
        $this->mqttClass = new phpMQTT($data->host, $data->port, $data->clientName);
    }

	public function sendMessage ($channel, $message, $qos = 1)
	{
		if ($this->mqttClass->connect()) {
			$this->mqttClass->publish($channel, $message, $qos);
			$this->mqttClass->close();
		}

	}
}