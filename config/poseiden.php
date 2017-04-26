<?php
return [
    'Poseiden' => [
        'deviceConnector' => [
	        'PhilipsHueBridge' => [
		        'name' => 'Hue Bridge',
		        'brand' => 'Philips',
                'author' => 'Poseiden',
                'version' => '0.0.1',
                'device discovery' =>  true,
		        'class' => 'App\Utility\PhilipsHue\DeviceConnector\BridgeConnector'
	        ],
            'simpleMQTTConnector' => [
                'name' => 'Simple MQTT Connector',
                'brand' => 'Poseiden',
                'author' => 'Poseiden',
                'version' => '0.0.1',
                'devicediscovery' => false,
                'class' => 'App\Utility\Poseiden\DeviceConnector\simpleMqttConnector'
            ],
            'yeeLightConnector' => [
                'name' => 'YeeLight Connector',
                'brand' => 'Xiaomi',
                'author' => 'Poseiden',
                'version' => '0.0.1',
                'devicediscovery' => true,
                'class' => 'App\Utility\Poseiden\DeviceConnector\yeeLightConnector'
            ]
        ],
	    'devices' => [
            'h801RGBBeta' => [
                'name' => 'H801 RGB MQTT',
                'brand' => 'Poseiden',
                'version' => '0.0.1',
                'type' => 'colorlight',
                'deviceConnector' => 'simpleMQTTConnector',
                'class' => 'App\Utility\Poseiden\Devices\h801RGBBeta'
            ]
	    ],
        'deviceTypes' => [
            'simple Device' => [
                'name' => 'Simple on off device',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn'
                ],
                'interfaceName' => 'simpleDevice'
            ],
            'dimmableDevice' => [
                'name' => 'Dimmable Device',
                'description' => 'dimmable Device or light',
                'dimStep' => '255',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn'
                ],
                'interfaceName' => 'dimmableDevice'
            ],
            'colorlight' => [
                'name' => 'Color Light',
                'description' => 'Colored Light',
                'dimStep' => '255',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn', 'setColor'
                ],
                'interfaceName' => 'colorlight'
            ]
        ]
    ],

];
