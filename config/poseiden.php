<?php
return [
    'Poseiden' => [
        'deviceConnector' => [
	        'PhilipsHueBridge' => [
		        'name' => 'Hue Bridge',
		        'brand' => 'Philips',
                'device discovery' =>  true,
		        'class' => 'App\Utility\PhilipsHue\DeviceInterface\BridgeConnector'
	        ],
            'simpleMQTTConnector' => [
                'name' => 'Simple MQTT Connector',
                'brand' => 'Poseiden',
                'device discovery' => false,
                'class' => 'App\Utility\Poseiden\DeviceInterface\simpleMqttConnectors'
            ]
        ],
	    'devices' => [
            ''
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
                'dimStep' => '256',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn'
                ],
                'interfaceName' => 'dimmableDevice'
            ]
        ]
    ],

];
