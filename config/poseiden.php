<?php
return [
    'Poseiden' => [
        'deviceConnector' => [
	        'PhilipsHueBridge' => [
		        'name' => 'Hue Bridge',
		        'brand' => 'Philips',
                'author' => 'Poseiden',
                'version' => '0.0.1',
                'deviceDiscovery' =>  true,
		        'class' => 'App\Utility\Devices\PhilipsHue\DeviceConnector\BridgeConnector'
	        ],
            'simpleMQTTConnector' => [
                'name' => 'Simple MQTT Connector',
                'brand' => 'Poseiden',
                'author' => 'Poseiden',
                'version' => '0.0.1',
                'deviceDiscovery' => false,
                'class' => 'App\Utility\Devices\Poseiden\DeviceConnector\simpleMqttConnector'
            ],
            'yeeLightConnector' => [
                'name' => 'YeeLight Connector',
                'brand' => 'Xiaomi',
                'author' => 'Poseiden',
                'version' => '0.0.1',
                'deviceDiscovery' => true,
                'class' => 'App\Utility\Devices\Poseiden\DeviceConnector\yeeLightConnector'
            ]
        ],
        'devices' => [
            'h801RGBBeta' => [
                'name' => 'H801 RGB MQTT',
                'brand' => 'Poseiden',
                'version' => '0.0.1',
                'type' => 'colorLight',
                'deviceConnector' => 'simpleMQTTConnector',
                'class' => 'App\Utility\Devices\Poseiden\Devices\h801RGBBeta'
            ],
            'Huedimmablelight' => [
                'name' => 'Hue Dimmable Light',
                'brand' => 'Philips',
                'version' => '0.0.1',
                'type' => 'dimmableDevice',
                'deviceConnector' => 'PhilipsHueBridge',
                'class' => 'App\Utility\Devices\PhilipsHue\DeviceDriver\DimmableLight'
            ]
        ],
        'deviceTypes' => [
            'simpleDevice' => [
                'name' => 'Simple on off device',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn'
                ],
                'interfaceName' => 'SimpleDevice'
            ],
            'dimmableDevice' => [
                'name' => 'Dimmable Device',
                'description' => 'dimmable Device or light',
                'dimStep' => '255',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn', 'setBrightness', 'getBrightness'
                ],
                'interfaceName' => 'DimmableDevice'
            ],
            'colorLight' => [
                'name' => 'Color Light',
                'description' => 'Colored Light',
                'dimStep' => '255',
                'functions' => [
                    'getState', 'setState', 'setOff', 'setOn', 'setBrightness', 'getBrightness', 'setColor', 'getColor'
                ],
                'interfaceName' => 'ColorLight'
            ]
        ]
    ],

];
