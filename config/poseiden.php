<?php
return [
    'Poseiden' => [
        'deviceConnector' => [
	        'PhilipsHueBridge' => [
		        'name' => 'Hue Bridge',
		        'brand' => 'Philips',
                'device discovery' =>  true,
		        'class' => 'App\Utility\PhilipsHue\DeviceConnector\BridgeConnector'
	        ],
            'simpleMQTTConnector' => [
                'name' => 'Simple MQTT Connector',
                'brand' => 'Poseiden',
                'device discovery' => false,
                'class' => 'App\Utility\Poseiden\DeviceConnector\simpleMqttConnector'
            ]
        ],
	    'devices' => [
            'h801RGBBeta' => [
                'name' => 'H801 RGB MQTT',
                'brand' => 'Poseiden',
                'version' => '0.0.1'
            ]
	    ],
        'deviceTypes' => [
            'simpleDevice' => [
                'name' => 'Simple on off device',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn'
                ],
                'interfaceName' => 'simpleDevice'
            ],
            'dimmableDevice' => [
                'name' => 'dimmable Device',
                'description' => 'dimmable Device or light',
                'dimStep' => '255',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn'
                ],
                'interfaceName' => 'dimmableDevice'
            ]
        ]
    ],

];
