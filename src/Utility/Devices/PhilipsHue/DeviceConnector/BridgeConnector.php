<?php

namespace App\Utility\Devices\PhilipsHue\DeviceConnector;

use App\Utility\Devices\Api;
use Phue;

/**
 * Class BridgeConnector
 * @package App\Utility\Devices\PhilipsHue\DeviceConnector
 * @author  Remco Janse <remko@djneo.nl>
 */
class BridgeConnector implements Api\DeviceControllerInterface
{

    /**
     * User ID as saved in hue bridge
     *
     * @var
     */
    private $hueUserId;

    /**
     * @var
     */
    private $connecter;


    public function installController()
    {
        // TODO: Implement installController() method.
    }

    public function initialiseController()
    {
        // TODO: Implement loadController() method.
    }

    public function getAllLightsTemplates()
    {
        $lights = $this->connecter->getLights();

        $return = [];
        foreach ($lights as $light) {
            /** @var $light Phue\LightInterface */
            $return[] = ['systemID' => $light->getId(), 'type' => $light->getType(), 'name' => $light->getName()];
        }

        return $return;
    }
}