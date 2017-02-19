<?php
namespace App\Utility\Poseiden\DeviceConnector;


use djneo\phpMQTT;

/**
 * Class DeviceControls
 *
 * Sends mqtt signals
 */
class simpleMqttConnector {


	/**
	 * @var phpMQTT;
	 */
	protected $mqttClass;

	public function initialize ($data)
	{
		$this->mqttClass = new phpMQTT($data['host'], $data['port'], $data['clientName']);
	}

	public function installConnector ()
	{
		

	}

	public function connectToMqttServer ()
	{
		if ($this->getMqttClass()->connect()) {
			$this->out('Connected to ;phpMQTT server')
		}
	}

	public function sendMessage ($channel, $message)
	{

	}
}