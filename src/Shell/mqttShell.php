<?php

namespace App\Shell;

use Cake\Console\Shell;
use djneo\phpMQTT;
/**
 * Class SocketShell
 * @package App\Shell
 */
class mqttShell extends Shell {

	/**
	 * @var
	 */
	public $mqttClass;

	/**
	 * @return mixed
	 */
	public function getMqttClass () {
		return $this->mqttClass;
	}

	/**
	 * @param mixed $mqttClass
	 */
	public function setMqttClass ($mqttClass) {
		$this->mqttClass = $mqttClass;
	}


	/**
	 *
	 */
	public function main () {
		$this->setMqttClass(new phpMQTT("poseiden.remko.ninja", 1883, "Poseiden Server")); //Change client name to something unique

		if ($this->getMqttClass()->connect()){
			$this->out('Connected to phpMQTT server');
		}


		$topics['m_bed/#'] = array("qos"=>0, "function"=>__CLASS__ . "::decodeMQTTMessage");
		$this->getMqttClass()->subscribe($topics,0);
		while($this->getMqttClass()->proc()){

		}
		$this->getMqttClass()->close();

	}

	static public function decodeMQTTMessage($topic,$msg){
		$topicExploded = explode('/',$topic);
		var_dump($topicExploded[1]);
		var_dump($msg);

		\Cake\Cache\Cache::write('mqttSensor'.$topicExploded[1], $msg);
	}



}